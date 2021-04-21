@foreach($comments as $comment)
    <div class="display-comment" id="displayComment">
        <div class="media">
            <div class="media-left">
                <img src="{{ asset('avatar.jpg') }}" class="media-object" style="width:45px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->name }}
                    <small><i>Posted {{ $comment->created_at->diffForHumans() }}</i></small>
                </h4>
                <p>{{ $comment->comment }}</p>

                @auth
                    <a id="replyText{{ $comment->id }}" class="replyTexts" onclick="showReplyForm({{ $comment->id }})">Reply</a>

                    <form id="replyForm{{ $comment->id }}" method="post" class="replyForms" action="{{ route('reply.add') }}">
                        @csrf
                        <div class="form-group">
                            <textarea name="replycomment" class="form-control" id="replyComment" rows="2"></textarea>
                            <input type="hidden" name="service_id" value="{{ $service_id }}" />
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                        </div>
                        <div class="form-group" style="display: flex; justify-content: flex-end">
                            <button type="submit" class="btn btn-sm btn-warning text-right">Reply</button>
                        </div>
                    </form>
                @endauth

                @include('partials.service.replies', ['comments' => $comment->replies])
            </div>
        </div>
    </div>
@endforeach

<style>
    .shownhideReplyForm{
        display: block !important;
    }
    .replyForms{
        display: block;
        margin-top: -20px;
    }
    .replyTexts{
        display: block;
        margin-bottom: 20px;
        margin-top: -10px;
        text-transform: uppercase;
    }
</style>
<script>
    var replyForms = document.getElementsByClassName('replyForms')

    for (let i = 0; i < replyForms.length; i++) {
        replyForms[i].style.display = "none";
    }

    function showReplyForm(id){
        var replyText = document.getElementById('replyText'+id);
        document.getElementById('replyForm'+id).classList.toggle("shownhideReplyForm");
        if (replyText.innerHTML === "Reply") {
            replyText.innerHTML = "Close";
        } else {
            replyText.innerHTML = "Reply";
        }
    }
</script>
