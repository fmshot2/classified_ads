<div>
    @auth
        <a onclick="showReplyForm({{ $comment->id }})" id="replyText{{ $comment->id }}" class="replyTexts"><i class="fa fa-reply"></i> Reply</a>

        <form id="replyForm{{ $comment->id }}" class="replyForms" wire:submit.prevent="storeReply">
            @csrf
            <div class="form-group">
                <input type="text" name="newReply" wire:model.lazy="newReply" class="form-control" />
                <input type="hidden" name="service_id" value="{{ $service_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group" style="display: flex; justify-content: flex-end">
                <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-reply"></i> Reply</button>
            </div>
        </form>
    @endauth

    @livewire('comments.comments', ['comments' => $comment->replies, 'service_id' => $service_id, 'comment_id' => $comment->id], key(Str::random()))


    <script>
        var replyForms = document.getElementsByClassName('replyForms')
        for (let i = 0; i < replyForms.length; i++) {
            replyForms[i].style.display = "none";
        }

        function showReplyForm(id){
            var replyText = document.getElementById('replyText'+id);
            document.getElementById('replyForm'+id).classList.toggle("shownhideReplyForm");
            if (replyText.innerHTML === '<i class="fa fa-reply"></i> Reply') {
                replyText.innerHTML = '<i class="fa fa-close"></i> Close';
            } else {
                replyText.innerHTML = '<i class="fa fa-reply"></i> Reply';
            }
        }
    </script>
</div>
