<?php

namespace App\Http\Livewire\Comments;

use App\Comment;
use App\Service;
use Illuminate\Http\Request;
use Livewire\Component;

class Comments extends Component
{
    public $comments, $service_id, $comment_id, $newReply;

    public function render()
    {
        return view('livewire.comments.comments');
    }
}
