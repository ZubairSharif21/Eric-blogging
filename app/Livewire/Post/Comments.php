<?php

namespace App\Livewire\Post;

use Livewire\Component;
use App\Models\Comment as ModelComment;
use Livewire\Attributes\Validate;

class Comments extends Component
{

    public $comment;
    public $post;
    #[Validate('required', message: 'Your comment cannot be empty')]
    public $content;

    public function mount($post)
    {
        $this->comment = new ModelComment;
        $this->post = $post;
    }
    public function save()
    {
        $this->validate();
        $newComment = $this->comment->create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'parent_id' => 0,
            'mention_id' => 0,
            'published' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'published_at' => now(),
            'content' => $this->content
        ]);

        session()->flash('successUpdate', 'Your comment has successfully posted.');
        session()->flash('scrollToElementId', 'comment' . $newComment->id);
        return $this->redirect('/blog/' . date('Y', strtotime($this->post->published_at)) . '/' . $this->post->slug);
    }

    public function render()
    {
        $scrollToElementId = session()->get('scrollToElementId');
        return view('livewire.post.comments', ['scrollToElementId' => $scrollToElementId]);
    }
}
