<?php

namespace App\Livewire\Dashboard\Navbar;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationDropdown extends Component
{
    public $user;
    public $notifications;
    public function mount()
    {
        $this->user = auth()->user();
        $this->notifications = User::find($this->user->id)->notifications()->where('read_at', null)->take(3)->get();
    }

    public function redirectToNotification($notification)
    {
        Auth::user()->notifications()->find($notification['id'])->markAsRead();
        return $this->redirect('/dashboard/notifications/' . $notification['id'], navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard.navbar.notification-dropdown');
    }
}
