<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ActiveTab extends Component
{
    public $notification;
    public $isFavorite;
    public $isArchived;
    public $isDeleted;
    public $read_at;

    public function mount($notification)
    {
        $this->notification = $notification;
        $this->isFavorite = $notification->isFavorite;
        $this->isArchived = $notification->isArchived;
        $this->isDeleted = $notification->isDeleted;
        $this->read_at = $notification->read_at;
    }

    public function redirectToNotification($notification)
    {
        Auth::user()->notifications()->find($notification['id'])->markAsRead();
        return $this->redirect('/dashboard/notifications/' . $notification['id'], navigate: true);
    }

    public function markAsUnread()
    {

        $this->notification->update([
            'read_at' => null,
            'isFavorite' => false,
            'isArchived' => false,
            'isDeleted' => false
        ]);
        session()->flash('successUpdate', 'Notification Marked Unread !');
        $this->redirectRoute('notifications', navigate: true);
    }
    public function markAsRead()
    {

        $this->notification->update([
            'read_at' => now(),
        ]);

        session()->flash('successUpdate', 'Notification Marked as Read !');
        $this->redirect(request()->header('Referer'), navigate: true);
    }
    public function markAsFavorite()
    {
        $isFavorite = $this->isFavorite;
        if ($isFavorite !== $this->notification->isFavorite) {

            $this->notification->update(['isFavorite' => $isFavorite]);
            if ($isFavorite === true) {
                session()->flash('successUpdate', 'Notification Marked as Favorite !');
                $this->redirectRoute('notifications', ['activeTab' => 'tabFavorite'], navigate: true);
            } else {
                session()->flash('successUpdate', 'Notification Unmarked as Favorite !');
                $this->redirectRoute('notifications', ['activeTab' => 'tabAll'], navigate: true);
            }
        }
    }
    public function moveToArchive()
    {

        $this->notification->update([
            'isArchived' => true
        ]);

        session()->flash('successUpdate', 'Notification Archived !');
        $this->redirectRoute('notifications', ['activeTab' => 'tabArchive'], navigate: true);
    }
    public function moveToTrash()
    {

        $this->notification->update([
            'isDeleted' => true
        ]);

        session()->flash('successUpdate', 'Notification Deleted !');
        $this->redirectRoute('notifications', ['activeTab' => 'tabTrash'], navigate: true);
    }

    public function moveFromArchive()
    {
        $this->notification->update([
            'isArchived' => false
        ]);

        session()->flash('successUpdate', 'Notification Unarchived !');
        $this->redirectRoute('notifications', navigate: true);
    }

    public function moveFromTrash()
    {

        $this->notification->update([
            'isDeleted' => false,
            'isArchived' => false

        ]);

        session()->flash('successUpdate', 'Notification Restored !');
        $this->redirectRoute('notifications', navigate: true);
    }
    public function render()
    {
        return view('livewire.dashboard.active-tab');
    }
}
