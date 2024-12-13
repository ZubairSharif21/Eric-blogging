<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('superadmin')) {
            $comments = Comment::with('post', 'user')->get();
        } else {
            $comments = Comment::with('post', 'user')
                ->where('user_id', Auth::user()->id)
                ->get();
        }
        return view('dashboard.comments.index', [
            'comments' => $comments,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {

        function deleteNotification($comment)
        {
            if ($comment->mention_id !== 0) {
                $user = User::find(Comment::find($comment->mention_id)->user_id);

                $notifications = $user->notifications()
                    ->whereJsonContains('data->comment_id_reply', $comment->id)
                    ->get();

                foreach ($notifications as $notification) {
                    $notification->delete();
                }
            }
            $replies = $comment->where('mention_id', $comment->id)->get();

            foreach ($replies as $reply) {
                deleteNotification($reply);
            }
        }

        deleteNotification($comment);

        $comment->deleteWithReplies();

        return redirect('dashboard/comments')->with('success', 'Comments and its replies has been deleted!');
    }

    public static function fetchComments()
    {
        $comments = Comment::all();
        return response()->json($comments);
    }
}
