<div>
    @foreach($comments as $comment)
        <div class="display-comment">
            <div class="media">
                <div class="media-left">
                    <img src="{{ asset('avatar.jpg') }}" class="media-object" style="width:45px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->user->name }}
                        <small><i>Posted {{ $comment->created_at->diffForHumans() }}</i></small>
                    </h4>
                    <p>{{ $comment->comment }}</p>

                    @livewire('comments.replies', ['comment' => $comment, 'service_id' => $service_id, 'comment_id' => $comment->id], key($comment->id))
                </div>
            </div>
        </div>
    @endforeach

    <style>
        .shownhideReplyForm{
            display: block !important;
        }
        .replyTexts{
            display: block;
            margin-bottom: 20px;
            margin-top: -10px;
            text-transform: uppercase;
        }
        .user-comments .media-heading small{
            font-size: 12px;
        }
        .user-comments .media-heading small i{
            font-style: normal !important;
        }
    </style>
</div>
