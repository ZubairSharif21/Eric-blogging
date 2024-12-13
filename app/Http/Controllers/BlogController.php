<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use carbon\Carbon;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        // Eager Loading 'with' user model
        $posts = Post::with('user', 'category', 'tags')->where('published', '=', 1)->where('published_at', '<=', Carbon::now())->orderBy('published_at', 'desc')->paginate(10);
        $categories = Category::with(['posts' => function (Builder $query) {
            /** @var \App\Models\Post $query **/
            $query->where('published', '=', 1)->where('published_at', '<=', Carbon::now());
        }])->get();
        $tags = Tag::with('posts', 'tagScheme')->get();

        $post_date = DB::table('posts')
        ->select(
            DB::raw('YEAR(published_at) AS year'),
            DB::raw('MONTH(published_at) AS month'),
            DB::raw('DATE_FORMAT(published_at, "%M") AS monthname'),
            DB::raw('COUNT(*) as total')
        )
        ->where('published', '=', 1)
        ->where('published_at', '<=', Carbon::now())
        ->groupBy('year', 'monthname', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

        $post_year = DB::table('posts')
            ->select(DB::raw('EXTRACT(YEAR FROM published_at) AS year'), DB::raw('count(*) as total'))
            ->where('published', '=', 1)
            ->where('published_at', '<=', Carbon::now())
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();

        // $year = $post_year->select(DB::raw('year'), DB::raw('count(*) as totalYear'))->groupBy('year');
        // dd($post_year);
        return view('blog', [
            'title' => 'Blog | Eric Blog',
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
            'dates' => $post_date,
            'years' => $post_year,
            // 'countDate' => $post_dateD
        ]);
    }


    public function show($year, $slug)
    {
        /**Get Model From RouteServiceProvider.php
         *
         * Bind 2 columns on URL
         */
        // Validate that $year is a 4-digit number
        if (!is_numeric($year) || strlen($year) !== 4) {
            abort(404);
        }
        $singlePost = Post::with('user', 'category', 'tags')
            ->where('slug', $slug)
            ->whereYear('published_at', $year)
            ->where('published', 1)
            ->where('published_at', '<=', Carbon::now())
            ->firstOrFail();

        $comments = Comment::with('user')
            ->where('post_id', '=', $singlePost->id)
            ->where('published', '=', 1)
            ->orderBy('updated_at', 'DESC')
            ->get();

        $user = User::with('comments')->get();

        $commentOriginal = $comments->where('parent_id', 0);
        $replies = $comments->filter(function ($comment) use ($comments) {
            return $comment->parent_id != 0 && $comments->contains('id', $comment->parent_id);
        });

        return view('layouts.blog.show', [
            'title' => $singlePost->category->name . ' - ' . ($singlePost->metaTitle ?? $singlePost->title),
            'singlePost' => $singlePost,
            'comments' => $commentOriginal ?? [],
            'replies' => $replies ?? [],
            'users' => $user,
            'oriComments' => $comments ?? []
        ]);
    }

    public function tahun($year)
    {
        $query = Post::with('category', 'user', 'tags')
            ->whereYear('published_at', $year)
            ->where('published', 1)
            ->where('published_at', '<=', DB::raw('now()'))
            ->orderBy('published_at', 'desc');

        $getRows = $query->paginate(10);

        if ($getRows->isEmpty()) {
            abort(404);
        }

        return view('layouts.blog.showcase', [
            'getRows' => $getRows,
            'title' => $year . ' Archive',
            'year' => $year
        ]);
    }

    /* Retrieve archive of Year and Month */
    public function bulan($tahun, $bulan)
    {
        $validMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        if (!in_array(ucfirst($bulan), $validMonths)) {
            abort(404, 'Invalid month name.');
        }

        $month = Carbon::parse('1 ' . $bulan)->format('m');

        $query = Post::with('category', 'user', 'tags')
            ->whereYear('published_at', $tahun)
            ->whereMonth('published_at', $month)
            ->where('published', 1)
            ->where('published_at', '<=', DB::raw('now()'))
            ->orderBy('published_at', 'desc');

        $getRows = $query->paginate(10);

        if ($getRows->isEmpty()) {
            abort(404, 'No posts found for the specified year and month.');
        }
        return view('layouts.blog.showcase', [
            'getRows' => $getRows,
            'title' => ucfirst($bulan) . ' ' . $tahun . ' Archive',
            'year' => $tahun . ' - ' . ucfirst($bulan)
        ]);
    }

    public function category(Category $category)
    {
        $posts = Post::with('user', 'category', 'tags')->where('category_id', '=', $category->id)->where('published', '=', 1)->where('published_at', '<=', Carbon::now())->orderBy('published_at', 'desc')->paginate(10);

        return view('layouts.blog.category', [

            'title' => $category->name,
            'posts' => $posts
        ]);
    }

    public function tag(Tag $tag)
    {
        // $id = [$tag->id];
        // $posts = Post::with('user', 'category', 'tags')->where('published', '=', 1)->where(function ($query) use ($id) {
        //     foreach ($id as $value) {
        //         $query->whereHas('tags', function ($query) use ($value) {
        //             $query->where('tag_id', $value);
        //         });
        //     }
        // })->paginate(10);

        $slug = $tag->slug;
        $posts = Post::with('user', 'category', 'tags')->where('published', '=', 1)->where('published_at', '<=', Carbon::now())->whereHas('tags', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('layouts.blog.tag', [

            'title' => $tag->name,
            'posts' => $posts
        ]);
    }
}
