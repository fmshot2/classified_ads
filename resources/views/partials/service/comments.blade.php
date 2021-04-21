@include('partials.service.replies', ['comments' => $serviceDetail->comments, 'service_id' => $serviceDetail->id])


@auth
    <div class="comment-form">
        <div class="card-body">
            <h5>Leave a Feedback</h5>
            <form id="theCommentForm">
                @csrf
                <div class="form-group">
                    <textarea name="comment" class="form-control" id="comment" rows="3"></textarea>
                    <input type="hidden" name="service_id" id="service_id" value="{{ $serviceDetail->id }}" />
                </div>
                <div class="form-group">
                    <button type="button" id="submitFeedbackBtn" class="btn btn-warning btn-sm">Add a Feedback</button>
                </div>
            </form>
        </div>
    </div>

@else
    <p style="margin-bottom: 5px; font-size: 16px;"><a href="{{route('login')}}"><strong style="color: #CA8309; font-size: 16px;">Login</strong></a> or <a href="{{route('register')}}"><strong style="color: #28a745">Register</strong></a> to leave a feedback for <strong class="tt-capitalize">{{ $the_provider_f_name }}</strong>.</p>
@endauth

<script>
    var _token = $("input[name='_token']").val();
    var comment = $("#comment").val();
    var service_id = $("#service_id").val();
    var submitFeedbackBtn = document.getElementById('submitFeedbackBtn');

    $('button#submitFeedbackBtn').click( function() {
        submitFeedbackBtn.style.opacity = '.5'
        submitFeedbackBtn.innerHTML = 'Saving...'

        $.ajax({
            url: '{{ route("comment.add") }}',
            type: 'post',
            dataType: 'json',
            data: $('form#theCommentForm').serialize(),
            success: function(newComment) {
                console.log(newComment);
                toastr.success('Feedback Added!')
                submitFeedbackBtn.style.opacity = '1'
                submitFeedbackBtn.innerHTML = 'Add a Feedback'

                $('#displayComment').append(`
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ asset('avatar.jpg') }}" class="media-object" style="width:45px">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">jnkj
                                <small><i>Posted jnj</i></small>
                            </h4>
                        </div>
                    </div>
                `)

            }
        });
    });

    // function addComment() {
    //     $.ajax({
    //         type:'POST',
    //         url: '{{ route('comment.add') }}',
    //         data: {
    //             _token:_token,
    //             comment:comment,
    //             service_id:service_id
    //         },
    //         success: function(newComment) {
    //             console.log(newComment);
    //         }
    //     });
    // }
</script>
