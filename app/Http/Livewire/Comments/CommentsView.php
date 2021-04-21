<?php

namespace App\Http\Livewire\Comments;

use App\Comment;
use App\Service;
use Illuminate\Http\Request;
use Livewire\Component;

class CommentsView extends Component
{
    public $comments, $service_id, $newComment, $provider_name;

    protected $listeners = ['newReplyAdded'];

    public function newReplyAdded()
    {
        $service = Service::find($this->service_id);
        $this->comments = $service->comments->sortByDesc('created_at');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request)
    {
        if ($this->newComment == '') {
            return;
        }

        $comment = new Comment();
        $comment->comment = $this->newComment;
        $comment->user()->associate($request->user());
        $service = Service::find($this->service_id);
        $service->comments()->save($comment);

        $this->comments = $service->comments->sortByDesc('created_at');

        $this->newComment = '';

    }

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

    }


    public function render()
    {
        return view('livewire.comments.comments-view');
    }
}
