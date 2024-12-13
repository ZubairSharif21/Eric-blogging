<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('superadmin')) {

            $posts = Post::with('category', 'tags')->get();
        } else {
            $posts = Post::with('category', 'tags')->where('user_id', Auth::user()->id)->get();
        }
        return view('dashboard.index', ['posts' => $posts]);
    }

    public function notifications()
    {

        return view('dashboard.notifications');
    }

    public function notificationsShow($notification)
    {
        $user = auth()->user();
        try {
            Uuid::fromString($notification);
        } catch (\Exception $exception) {
            return abort(404);
        }
        $notification = User::find($user->id)->notifications()->findOrFail($notification);
        return view('dashboard.notifications-show', ['notification' => $notification]);
    }
}
