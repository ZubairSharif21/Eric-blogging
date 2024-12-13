<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class ContentSection extends Component
{
    public $isExpanded;
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
        $this->isExpanded = Cache::get('sidebar_' . $this->user->id, true);
    }
    public function render()
    {
        return view('livewire.dashboard.content-section');
    }
}
