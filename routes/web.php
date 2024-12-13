<?php

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact-us', function () {
    return view('new_frontend.contact-us');
})->name('contact-us');
Route::get('/about-us', function () {
    return view('new_frontend.about-us');
})->name('about-us');
Route::get('/u/{username}', function ($username) {
    $user = \App\Models\User::where('username', $username)->first();
    if (!$user) {
        abort(404);
    }
    return view('blog');
})->name('user.profile');

Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('categories/{category:slug}', [BlogController::class, 'category'])->name('blog.category');
    Route::get('tags/{tag:slug}', [BlogController::class, 'tag'])->name('blog.tag');
    Route::get('archive/{tahun}', [BlogController::class, 'tahun'])->name('blog.archive.year');
    Route::get('archive/{tahun}/{bulan}', [BlogController::class, 'bulan'])->name('blog.archive.month');
    Route::get('{year}/{slug}', [BlogController::class, 'show'])->name('singlePost');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('posts/checkSlug', [PostController::class, 'checkSlug'])->name('posts.checkSlug');
    Route::get('categories/checkSlug', [CategoryController::class, 'checkSlug'])->name('categories.checkSlug');
    Route::get('tags/checkSlug', [TagController::class, 'checkSlug'])->name('tags.checkSlug');
    Route::get('notifications', [DashboardController::class, 'notifications'])->name('notifications');
    Route::get('notifications/{notification:id}', [DashboardController::class, 'notificationsShow'])->name('notifications.show');
    Route::post('posts/cache-image', [PostController::class, 'cache'])->name('posts.cacheImage');
    Route::post('users/{username}/verify', [\App\Http\Controllers\UserController::class, 'verify'])->name('users.verify');
    Route::post('users/{username}/unverify', [\App\Http\Controllers\UserController::class, 'unverify'])->name('users.unverify');
    Route::post('users/{user:username}/saveImage', [\App\Http\Controllers\UserController::class, 'saveImage'])->name('users.saveImage');
    Route::resource('posts', PostController::class)->names('posts');
    Route::resource('categories', CategoryController::class)->names('categories');
    Route::resource('tags', TagController::class)->names('tags');
    Route::resource('users', \App\Http\Controllers\UserController::class)->names('users');
    Route::resource('comments', \App\Http\Controllers\CommentController::class)->names('comments');
});

Route::get('/editor', function () {
    return view('editor', ['postData' => Post::where('id', 1)->first()]);
})->name('editor');

Route::get('/cropper', function () {
    return view('cropper');
})->name('cropper');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.submit');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    // Get the authenticated user
    $user = $request->user();

    // Unassign the previous role
    if ($user->hasRole('visitor')) {
        $user->removeRole('visitor');
    }

    // Assign the 'user' role upon successful email verification
    $user->assignRole('user');

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    /** @var MustVerifyEmail $user */
    $user = auth()->user();
    if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {
        $user->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }

    return back();
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
