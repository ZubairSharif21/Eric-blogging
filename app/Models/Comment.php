<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function deleteWithReplies()
    {

        $this->delete();

        $replies = $this->where('mention_id', $this->id)->get();

        foreach ($replies as $reply) {
            $reply->deleteWithReplies();
        }
    }
}
