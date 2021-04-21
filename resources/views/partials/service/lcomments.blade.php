@include('partials.service.replies', ['comments' => $serviceDetail->comments, 'service_id' => $serviceDetail->id])


@auth
    <div class="comment-form">
        <div class="card-body">
            <h5>Leave a Feedback</h5>
            <form method="post" action="{{ route('comment.add') }}">
                @csrf
                <div class="form-group">
                    <textarea name="comment" class="form-control" id="comment" rows="3"></textarea>
                    <input type="hidden" name="service_id" id="service_id" value="{{ $serviceDetail->id }}" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-sm">Add a Feedback</button>
                </div>
            </form>
        </div>
    </div>

@else
    <p style="margin-bottom: 5px; font-size: 16px;"><a href="{{route('login')}}"><strong style="color: #CA8309; font-size: 16px;">Login</strong></a> or <a href="{{route('register')}}"><strong style="color: #28a745">Register</strong></a> to leave a feedback for <strong class="tt-capitalize">{{ $the_provider_f_name }}</strong>.</p>
@endauth
