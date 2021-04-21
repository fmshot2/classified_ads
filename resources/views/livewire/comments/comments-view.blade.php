<div>
    <div>
        <h5 style="text-transform: uppercase">Leave a feedback</h5>
        @auth
            <form method="post" wire:submit.prevent="storeComment">
                @csrf
                <div class="form-group">
                    <input type="text" name="newComment" wire:model.lazy="newComment" class="form-control" />
                    <input type="hidden" name="service_id" value="{{ $service_id }}" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-sm btn-warning" style="font-size: 0.8em;" value="Add Feedback" />
                </div>
            </form>
        @else
            <p style="margin-bottom: 20px; font-size: 16px;"><a href="{{route('login')}}"><strong style="color: #CA8309; font-size: 16px;">Login</strong></a> or <a href="{{route('register')}}"><strong style="color: #28a745">Register</strong></a> to leave a feedback for <strong class="tt-capitalize">{{ $provider_name }}</strong>.</p>
        @endauth
    </div>


    @if ($comments->count() > 0)
        <h5 style="text-transform: uppercase; font-family: Poppins-Regular; margin-bottom: 15px">All Clients Feedbacks</h5>
    @endif

    @livewire('comments.comments', ['comments' => $comments, 'service_id' => $service_id], key(Str::random()))
</div>
