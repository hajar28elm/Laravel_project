@extends('user.stories.layout')
@section('content')
    <div class="container">
    <div class="video-container">
            <div id="chapter1" class="video" style="background-color:black;">
                <iframe  allowfullscreen></iframe>
            </div>
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Learners stories</h6>
            </div>
             <br>
             <br>
            <form id="story-form" action="{{ route('dashboard.story') }}" method="post">
            @csrf
             <input type="hidden" name="student_id" value="{{ Auth::user()->id}}" />
            <textarea name="contenu" placeholder="Tell us your story with LearnIt"></textarea>
            <input type="submit" value="Send Story" class="btn btn-success"></br>
            </form>
            </br></br>
             <hr>
                <div id="comments-container" class="comments">
                  <div class="comment-list">
                 @foreach ($stories as $item)
                 <div class="comment">
                 <div class="comment-author">
                 <img src="{{ asset('img/'.$item->student->img)}}" alt="User Avatar" class="avatar">
                 <span class="author-name">{{$item->student->name}}</span>
                 </div>
                 <div class="comment-body">
                   <p class="comment-text">{{ $item->contenu }}</p>
                    <span class="comment-date">Posted on {{ $item->created_at}} 
                     @if($item->student_id == Auth::user()->id)
                      <input class="btn btn-danger remove-story" data-story-id="{{ $item->id }}" style="width: 100px; height:30px; margin-left: 1000px; " value="remove"/>
                     @endif
                    </span>
                </div>
                </div>
            @endforeach
            </div>
        </div>
</div>
@endsection
@push('javascript')
 <script>
    var student_id = {{ Auth::user()->id }}
     $(document).ready(function(){

        $('#story-form').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }});
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        var newStory = `
                            <div class="comment">
                                <div class="comment-author">
                                    <img src="img/${response.story.image}" alt="User Avatar" class="avatar">
                                    <span class="author-name">${response.story.author}</span>
                                </div>
                                <div class="comment-body">
                                    <p class="comment-text">${response.story.content}</p>
                                    <span class="comment-date">Posted on ${response.story.date}
                                    ${response.story.student == student_id ? `<input class="btn btn-danger remove-story"  data-story-id="${response.story.student}" style="width: 100px; height:30px; margin-left: 1000px; " value="remove"/>` : ``}
                                    </span>
                                </div>
                            </div>
                        `;
                        $('.comment-list').append(newStory);

                        // Clear the form inputs
                        $('#story-form')[0].reset();
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(error);
                }
            });
        });

        $('.remove-story').click(function(){
            var storyId = $(this).data('story-id');
            var removeButton = $(this);
            $.ajax({
            url: '/story/' + storyId,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    removeButton.closest('.comment').remove();
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
 </script>
@endpush