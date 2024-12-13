<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    public $user;
    public $notifications;
    public $favorites;
    public $unreads;
    public $archives;
    public $deletes;
    public function mount()
    {
        $this->user = auth()->user();
        $this->notifications = User::find($this->user->id)->notifications()->where('isArchived', 0)->where('isDeleted', 0)->get();
        $this->favorites = User::find($this->user->id)->notifications()->where('isFavorite', 1)->where('isArchived', 0)->where('isDeleted', 0)->get();
        $this->unreads = User::find($this->user->id)->unreadNotifications()->where('isArchived', 0)->where('isDeleted', 0)->get();
        $this->archives = User::find($this->user->id)->notifications()->where('isArchived', 1)->where('isDeleted', 0)->get();
        $this->deletes = User::find($this->user->id)->notifications()->where('isDeleted', 1)->get();
    }

    public function render()
    {
        return view('livewire.dashboard.notifications');
    }
}
