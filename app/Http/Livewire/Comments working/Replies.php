<?php

namespace App\Http\Livewire\Comments;

use App\Comment;
use App\Service;
use Illuminate\Http\Request;
use Livewire\Component;

class Replies extends Component
{
    public $comment, $service_id, $comment_id, $newReply;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeReply(Request $request)
    {
        if ($this->newReply == '') {
            return;
        }

        $reply = new Comment();
        $reply->comment = $this->newReply;
        $reply->user()->associate($request->user());
        $reply->parent_id = $this->comment_id;
        $service = Service::find($this->service_id);
        $service->comments()->save($reply);

        $this->comments = $service->comments->sortByDesc('created_at');
        $this->newReply = '';

        $this->emit('newReplyAdded');

    }

    public function render()
    {
        return view('livewire.comments.replies');
    }
}
