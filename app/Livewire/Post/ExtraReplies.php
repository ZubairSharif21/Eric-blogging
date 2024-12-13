<?php

namespace App\Livewire\Post;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Notifications\CommentCommentedNotification;

class ExtraReplies extends Component
{
    public $comment, $c, $post;

    #[Validate('required', message: 'Reply can not be empty!')]
    public $content;

    public function mount($comment, $c, $post)
    {
        $this->comment = $comment;
        $this->c = $c;
        $this->post = $post;
    }

    public function save()
    {
        $this->validate();

        $newComment = $this->comment->create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'parent_id' => $this->comment->id,
            'mention_id' => $this->c->id,
            'published' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'published_at' => now(),
            'content' => $this->content
        ]);

        if (auth()->user()->id !== $this->c->user->id) {

            $user = $this->c->user;
            $user->notify(new CommentCommentedNotification($newComment));
        }
        session()->flash('successUpdate', 'Your comment has successfully posted.');
        session()->flash('scrollToElementId', 'comment' . $newComment->id);
        return $this->redirect('/blog/' . date('Y', strtotime($this->post->published_at)) . '/' . $this->post->slug);
    }

    public function update()
    {
        $this->validate();

        $this->c->update([
            'content' => $this->content
        ]);

        session()->flash('successUpdate', 'Your comment has successfully updated.');
        session()->flash('scrollToElementId', 'comment' . $this->c->id);
        return $this->redirect('/blog/' . date('Y', strtotime($this->post->published_at)) . '/' . $this->post->slug);
    }
    public function render()
    {
        $scrollToElementId = session()->get('scrollToElementId');
        return view('livewire.post.extra-replies', ['scrollToElementId' => $scrollToElementId]);
    }
}