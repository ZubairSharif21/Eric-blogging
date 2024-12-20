<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('create', Post::class);

        if (Auth::user()->hasRole('superadmin')) {

            $posts = Post::with('category', 'tags')->get();
        } else {
            $posts = Post::with('category', 'tags')->where('user_id', Auth::user()->id)->get();
        }

        $categories = Category::pluck('name', 'id');
        return view('dashboard.posts.index', [
            'posts' => $posts,
            'categories' => $categories,
            'title' => 'Dashboard | Post'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->authorize('create', Post::class);

        if (!$request->session()->has('errors') && !$request->old('content')) {

            $request->session()->forget('temp_image_names');
            $request->session()->forget('temp_image_urls');
        }
        $posts = Post::with('category')->get();
        $category = Category::with('posts')->get();
        $tags = Tag::with('tagScheme')->get();
        return view('dashboard.posts.create', [
            'title' => 'Dashboard | Post',
            'posts' => $posts,
            'tags' => $tags,
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'metaTitle' => 'nullable|max:100',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'parent_id' => 'nullable|exists:posts,id',
            'image' => 'image|file|max:1024',
            'summary' => 'nullable|max:255',
            'content' => 'required',
            'tags' => 'required',
            'published_at' => 'nullable|date_format:Y-m-d H:i:s',
        ], ['tags.required' => 'Please select at least one tag']);

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['content'] = base64_decode($request->input('content'));


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images/post-img');
        }

        if ($request->has('publish')) {
            $validatedData['published'] = 1; // Set published to 1 if Publish button was pressed
            if ($request->published_at == null) {
                $validatedData['published_at'] = now();
            }
        } elseif ($request->has('unpublish')) {
            $validatedData['published'] = 0; // Set published to 0 if Unpublish button was pressed
        }

        // dd($validatedData);
        $post = Post::create($validatedData);

        foreach ($request->tags as $tagId) {
            DB::table('post_tag')->insert([
                'post_id' => $post->id,
                'tag_id' => $tagId
            ]);
        }

        $postSlug = $request->input('slug');
        $tempImageNames = $request->session()->get('temp_image_names');
        $tempImageUrls = $request->session()->get('temp_image_urls');
        if ($tempImageNames) {
            foreach ($tempImageNames as $key => $tempImageName) {
                $finalImageName = "images/post-images/{$postSlug}/" . basename($tempImageName);
                Storage::disk(env('FILESYSTEM_DISK'))->put($finalImageName, Storage::disk(env('FILESYSTEM_DISK'))->get($tempImageName)); // Move the image from the temp disk to the public disk under the post directory
                $finalImageUrl = Storage::disk(env('FILESYSTEM_DISK'))->url($finalImageName); // Generate the final URL for the image in the public storage

                $content = $post->content;
                $content = str_replace($tempImageUrls[$key], $finalImageUrl, $content);

                $post->content = $content;
            }
            $post->save();
        }

        return redirect('dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // dd($post);
        return view('layouts.blog.show', [
            'post' => $post,
            'title' => $post->metaTitle
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post, Request $request)
    {
        $this->authorize('edit', $post);


        if (!$request->session()->has('errors') && !$request->old('content')) {

            $request->session()->forget('temp_image_names');
            $request->session()->forget('temp_image_urls');
        }

        $posts = Post::with('category')->get();
        $category = Category::with('posts')->get();
        $tags = Tag::with('tagScheme')->get();
        return view('dashboard.posts.edit', [
            'post' => $post,
            'category' => $category,
            'tags' => $tags,
            'posts' => $posts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('edit', $post);

        $rules = [
            'title' => 'required|max:100',
            'metaTitle' => 'nullable|max:100',
            'category_id' => 'required',
            'parent_id' => 'nullable|exists:posts,id',
            'image' => 'image|file|max:1024',
            'summary' => 'nullable|max:255',
            'content' => 'required',
            'published_at' => 'nullable|date_format:Y-m-d H:i:s',
        ];

        $request->validate([
            'tags' => 'required',
        ]);

        // $rules['user_id'] = Auth::user()->id;

        // if ($request->slug != $post->slug) {
        //     $rules['slug'] = 'required|unique:posts';
        // }

        $validatedData = $request->validate($rules);
        $validatedData['content'] = base64_decode($request->input('content'));


        if ($request->file('image')) {
            if ($post->image != null) Storage::delete($post->image);

            $validatedData['image'] = $request->file('image')->store('images/post-img');
        }

        if ($request->has('publish')) {
            $validatedData['published'] = 1; // Set published to 1 if Publish button was pressed
            if ($request->published_at == null) {
                $validatedData['published_at'] = now();
            }
        } elseif ($request->has('unpublish')) {
            $validatedData['published'] = 0; // Set published to 0 if Unpublish button was pressed
        }



        // dd($validatedData);
        $postOri = $post;
        $postID = $post->id;

        Post::where('id', $post->id)->update($validatedData);
        $post = Post::where('id', $post->id)->first();



        DB::table('post_tag')->where('post_id', $postID)->delete();
        foreach ($request->tags as $tagId) {
            DB::table('post_tag')->insertOrIgnore([
                'post_id' => $postID,
                'tag_id' => $tagId
            ]);
        }



        // set link form temp to final url
        $postSlug = $post->slug;
        $tempImageNames = $request->session()->get('temp_image_names');
        $tempImageUrls = $request->session()->get('temp_image_urls');


        if ($tempImageNames) {
            foreach ($tempImageNames as $key => $tempImageName) {
                $finalImageName = "images/post-images/{$postSlug}/" . basename($tempImageName);
                Storage::disk(env('FILESYSTEM_DISK'))->put($finalImageName, Storage::disk(env('FILESYSTEM_DISK'))->get($tempImageName)); // Move the image from the temp disk to the public disk under the post directory
                $finalImageUrl = Storage::disk(env('FILESYSTEM_DISK'))->url($finalImageName); // Generate the final URL for the image in the public storage

                $content = $post->content;
                $content = str_replace($tempImageUrls[$key], $finalImageUrl, $content);

                $post->content = $content;
            }
            $post->save();
        }


        // Delete content images if deleted from post
        $contentUpdate = $post->content;
        $deletedImageUrls = $this->getDeletedImageUrls($contentUpdate, $postOri->content);
        $this->deleteImages($deletedImageUrls);

        return redirect('dashboard/posts')->with('success', 'New post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        if ($post->image) Storage::delete($post->image);

        $content = json_decode($post->content, true);
        // Extract image URLs from the content
        $imageUrls = [];
        foreach ($content['blocks'] as $block) {
            if ($block['type'] === 'image') {
                $imageUrls[] = $block['data']['file']['url'];
            }
        }

        // Delete the post images from the post-image folder
        foreach ($imageUrls as $imageUrl) {
            $slug = basename(dirname($imageUrl));
            $filename = basename($imageUrl);
            $imagePath = $slug . '/' . $filename;
            Storage::delete('images/post-images/' . $imagePath);

            // Delete the slug subfolder if it's empty
            $files = Storage::disk(env('FILESYSTEM_DISK'))->files('images/post-images/' . $slug);

            if (empty($files)) {
                Storage::disk(env('FILESYSTEM_DISK'))->deleteDirectory('images/post-images/' . $slug);
            }
        }

        Post::destroy($post->id);


        return redirect('dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    public function cache(Request $request)
    {
        $image = $request->file('image');
        $tempImageName = $image->store('temp/temp-images'); // Store the image in the temp storage
        $tempImageUrl = Storage::disk(env('FILESYSTEM_DISK'))->url($tempImageName); // Generate the temporary cache URL for the image

        // Store the temporary image name in the session
        $tempImageNames = $request->session()->get('temp_image_names', []); // Retrieve the existing array of temporary image names from the session, default to an empty array if it doesn't exist
        $tempImageNames[] = $tempImageName; // Add the new temporary image name to the array
        $request->session()->put('temp_image_names', $tempImageNames); // Store the updated array back in the session

        // Store the temporary image URL in the session
        $tempImageUrls = $request->session()->get('temp_image_urls', []); // Retrieve the existing array of temporary image URLs from the session, default to an empty array if it doesn't exist
        $tempImageUrls[] = $tempImageUrl; // Add the new temporary image URL to the array
        $request->session()->put('temp_image_urls', $tempImageUrls); // Store the updated array back in the session


        // Return the temporary image URL in the response
        return response()->json(['success' => 1, 'file' => ['url' => $tempImageUrl]]);
    }


    // Function to clean up temporary images
    public function cleanupTemporaryImages()
    {
        $tempImages = Storage::disk(env('FILESYSTEM_DISK'))->files('temp/temp-images');
        foreach ($tempImages as $tempImage) {
            $tempImageTimestamp = Storage::disk(env('FILESYSTEM_DISK'))->lastModified($tempImage);
            if (time() - $tempImageTimestamp > 60) {
                Storage::disk(env('FILESYSTEM_DISK'))->delete($tempImage);
            }
        }
    }


    public function getDeletedImageUrls($content, $post)
    {
        $imageUrls = [];
        $existingImageUrls = [];
        $blocks = json_decode($content, true)['blocks'];
        $existingBlocks = json_decode($post, true)['blocks'];

        foreach ($blocks as $block) {
            if ($block['type'] === 'image') {
                $imageUrls[] = $block['data']['file']['url'];
            }
        }

        foreach ($existingBlocks as $block) {
            if ($block['type'] === 'image') {
                $existingImageUrls[] = $block['data']['file']['url'];
            }
        }

        $deletedImageUrls = array_diff($existingImageUrls, $imageUrls);

        return $deletedImageUrls;
    }

    public function deleteImages($deletedImageUrls)
    {
        foreach ($deletedImageUrls as $deletedImageUrl) {
            $slug = basename(dirname($deletedImageUrl));
            $filename = basename($deletedImageUrl);
            $imagePath = $slug . '/' . $filename;
            Storage::delete('images/post-images/' . $imagePath);

            $files = Storage::disk(env('FILESYSTEM_DISK'))->files('images/post-images/' . $slug);

            if (empty($files)) {
                Storage::disk(env('FILESYSTEM_DISK'))->deleteDirectory('images/post-images/' . $slug);
            }
        }
    }
}
