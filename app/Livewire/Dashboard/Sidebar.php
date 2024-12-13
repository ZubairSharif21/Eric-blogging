<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;

class Sidebar extends Component
{
    public $isExpanded;
    public $isDashboard;
    public $isPost;
    public $isCategory;
    public $isTag;
    public $isUser;
    public $isComment;
    public $isNotification;
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
        $this->isExpanded = Cache::get('sidebar_' . $this->user->id, true);
        $this->isDashboard = Request::is('dashboard');
        $this->isPost = Request::is('dashboard/posts*');
        $this->isCategory = Request::is('dashboard/categories*');
        $this->isTag = Request::is('dashboard/tags*');
        $this->isUser = Request::is('dashboard/users*');
        $this->isComment = Request::is('dashboard/comments*');
        $this->isNotification = Request::is('dashboard/notifications*');
    }

    #[On('toggle-sidebar')]
    public function toggleSidebar()
    {
        $this->isExpanded = !$this->isExpanded;
        Cache::put('sidebar_' . $this->user->id, $this->isExpanded);
    }
    public function render()
    {
        return view('livewire.dashboard.sidebar');
    }
}
