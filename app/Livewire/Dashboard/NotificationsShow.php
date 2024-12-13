<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class NotificationsShow extends Component
{

    public $notification;
    public $isFavorite;
    public $isArchived;
    public $isDeleted;
    public function mount($notification)
    {
        $this->notification = $notification;
        $this->isFavorite = $notification->isFavorite;
        $this->isArchived = $notification->isArchived;
        $this->isDeleted = $notification->isDeleted;
    }

    public function markAsFavorite()
    {
        $isFavorite = $this->isFavorite;
        if ($isFavorite !== $this->notification->isFavorite) {

            $this->notification->update(['isFavorite' => $isFavorite]);
        }
    }
    public function markAsUnread()
    {

        $this->notification->update([
            'read_at' => null,
            'isFavorite' => false,
            'isArchived' => false,
            'isDeleted' => false
        ]);

        $this->redirectRoute('notifications', ['activeTab' => 'tabUnread'], navigate: true);
    }

    public function moveToArchive()
    {

        $this->notification->update([
            'isArchived' => true
        ]);

        $this->redirectRoute('notifications', ['activeTab' => 'tabArchive'], navigate: true);
    }
    public function moveToTrash()
    {

        $this->notification->update([
            'isDeleted' => true
        ]);

        $this->redirectRoute('notifications', ['activeTab' => 'tabTrash'], navigate: true);
    }
    public function moveFromArchive()
    {

        $this->notification->update([
            'isArchived' => false
        ]);

        $this->redirectRoute('notifications', ['activeTab' => 'tabAll'], navigate: true);
    }
    public function moveFromTrash()
    {

        $this->notification->update([
            'isDeleted' => false
        ]);

        $this->redirectRoute('notifications', ['activeTab' => 'tabTrash'], navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard.notifications-show');
    }
}
