@extends('user.learning.layout')
@section('content')
    <h3> {{ $course->nom }}  <h3> <i> {{ $course->chapitres->count()}} Chapters </i> <br>
    <input type="hidden" id="iid" data-courseid="{{ $course->id}}" name="course_id" value="{{ $course->id }}">
    &nbsp &nbsp
    <div class="container">
        <div class="video-container">
            <div id="chapter1" class="video" style="background-color:black;">
                <iframe  allowfullscreen></iframe>
            </div>
            &nbsp &nbsp &nbsp &nbsp
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Comments</h6>
            </div>
            <form id="comment-form" action="{{ route('dashboard.comments') }}" method="post">
            @csrf
             <input type="hidden" name="student_id" value="{{ Auth::user()->id}}" />
             <input type="hidden" name="course_id" value="{{ $course->id}}" />
            <textarea name="contenu" placeholder="Leave a comment"></textarea>
            <input type="submit" value="Send comment" class="btn btn-success"></br>
            </form>
                </br></br>
                <hr>
                <div id="comments-container" class="comments">
                  <div class="comment-list">
                 @foreach ($course->commentaires as $item)
                 <div class="comment">
                 <div class="comment-author">
                 <img src="{{ asset('img/'.$item->Student->img)}}" alt="User Avatar" class="avatar">
                 <span class="author-name">{{$item->Student->name}}</span>
                 </div>
                 <div class="comment-body">
                   <p class="comment-text">{{ $item->contenu }}</p>
                    <span class="comment-date">Posted on {{ $item->created_at}}</span>
                    <!-- Reply form for each comment -->
                    <form class="reply-form" data-comment-id="{{ $item->id }}" action="{{ route('dashboard.reply') }}" method="post">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ Auth::user()->id}}"/>
                        <input type="hidden" name="comment_id" value="{{ $item->id }}">
                        <textarea name="contenu" placeholder="Reply to this comment"></textarea>
                        <input type="submit" value="Reply" class="btn btn-success submit-reply">
                    </form>
                      <br>
                    <!-- Replies for each comment -->
                    <div  id="replies-container" class="replies">
                       <div class="reply-list" id="reply-list-{{ $item->id }}">
                        @foreach ($item->replies as $reply)
                            <div class="reply" >
                                <div class="reply-author">
                                    <img src="{{ asset('img/'.$reply->Student->img)}}" alt="User Avatar" class="avatar">
                                    <span class="author-name-reply">{{ $reply->Student->name }}</span>
                                </div>
                                <div class="reply-body">
                                    <p class="reply-text">{{ $reply->contenu }}</p>
                                    <span class="reply-date">Posted on {{ $reply->created_at }}</span>
                                </div>
                            </div>
                        @endforeach
                      </div>
                    </div>

                </div>
                </div>
            @endforeach
            </div>
            </div>
        </div>
        <div class="chapters">
             @foreach ($course->chapitres as $item)
            <ul class="chapter-list">
             <li><a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ $item->name}} <i> &nbsp{{ count($item->lessons)}} </i></a>
             <div class="dropdown-menu dropdown-menu-bottom">
                 @php $i=1; @endphp 
                 @foreach ($item->lessons as $lesson)
                 <form>
                 @php $countacheivement =0 @endphp
                  @if(Auth::check())
                 @php
                 $countacheivement = App\Models\Acheivement::countAcheivement($lesson['id'])
                 @endphp
                 @endif
                 <div id="{{$lesson->id}}">
                  @if($countacheivement > 0)  <input type="checkbox" checked="checked" id="{{$lesson->id}}">
                  @else <input type="checkbox" id="{{$lesson->id}}" disabled>
                  @endif
                 </div>
                 <a href="#"  data-lessonid="{{ $lesson->id}}" class="dropdown-item course_video">{{ $lesson->title}} &nbsp &nbsp{{$i++}}/{{ count($item->lessons)}}</a>
                </form>
                @endforeach
            </div>
            </li>
            </ul>
            @endforeach
            @php $countcertifictat =0 @endphp
             @if(Auth::check())
             @php
             $countcertificat = App\Models\Certificat::countCertificat($course['id'])
             @endphp
            @endif 
            <div class="wait"></div>
            <div id="button_certificat">
            @if($countcertificat > 0)  <a class="btn btn-primary  px-5 mt-2" href="{{ route('dashboard.certificat', ['id' => $course->id]) }}"> Get Certificate</a>
            @endif
            </div>
        </div>
    </div>
@endsection
@push('javascript')
 <script>
    var student_id = {{ Auth::user()->id }}
    var course_id = $('#iid').data('courseid');
     $(document).ready(function(){
        $('#comment-form').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        var newComment = `
                            <div class="comment">
                                <div class="comment-author">
                                    <img src="img/${response.comment.image}" alt="User Avatar" class="avatar">
                                    <span class="author-name">${response.comment.author}</span>
                                </div>
                                <div class="comment-body">
                                    <p class="comment-text">${response.comment.content}</p>
                                    <span class="comment-date">Posted on ${response.comment.date}</span>
                                </div>
                           
                            <form id="reply-form" class="reply-form" action="{{ route('dashboard.reply') }}" method="post">
                             @csrf
                             <input type="hidden" name="student_id" value="{{ Auth::user()->id}}"/>
                             <input type="hidden" name="comment_id" value="${response.comment.id}">
                             <textarea name="contenu" placeholder="Reply to this comment"></textarea>
                             <input type="submit" value="Reply" class="btn btn-success submit-reply">
                             </div>
                    </form>
                        `;
                        $('.comment-list').append(newComment);

                        // Clear the form inputs
                        $('#comment-form')[0].reset();
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(error);
                }
            });
        });
        $('.reply-form').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            var commentId = $(this).find('input[name="comment_id"]').val();
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        var newReply = `
                            <div class="reply">
                                <div class="reply-author">
                                    <img src="img/${response.reply.image}" alt="User Avatar" class="avatar">
                                    <span class="author-name">${response.reply.author}</span>
                                </div>
                                <div class="reply-body">
                                    <p class="reply-text">${response.reply.content}</p>
                                    <span class="reply-date">Posted on ${response.reply.date}</span>
                                </div>
                            </div>
                        `;
                        $('#reply-list-' +commentId).append(newReply);

                        // Clear the form inputs
                        $('.reply-form')[0].reset();
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(error);
                }
            });
        });
        
        $('.course_video').click(function(){
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                
            });
            var lesson_id = $(this).data('lessonid');
             $.ajax({
                 type: 'POST',
                 url: '/user/dashboard/lesson',
                 data: {
                         id: lesson_id,
                         student_id: student_id
                  },
                 success: function(response){
                   if(response.action == 'display'){
                        var videoUrl = response.videoUrl;
                        var idl = response.lesson_id;
                        $('.video').html(`<iframe src="videos/${videoUrl}" allowfullscreen></iframe>`);
                        setTimeout(function() {
                            $(`#${idl}`).html(`<input type="checkbox" checked="checked" id="${idl}">`);
                          }, 10000); // 10 seconds delay
                          
                  }
                  
                }
             });
            $.ajax({
             url: '/get_certificate',
             method: 'GET',
             data: {
                         course_id: course_id,
                         student_id: student_id
                  },
             dataType: 'json',
             success: function(response) {
               if (response.condition) {
                setTimeout(function() {
                 var Wait =`Please wait a little bit ...`
                 $('.wait').fadeIn();
                 $('.wait').css('background','green');
                 $('.wait').text(Wait);},10000);
                setTimeout(() => {$('.wait').fadeOut();},15000);
                setTimeout(function() {
                var getCertif =` <a class="btn btn-primary  px-5 mt-2" href="{{ route('dashboard.certificat', ['id' => $course->id]) }}"> Get Certificate</a>`
                $('#button_certificat').append(getCertif)}, 15000);        
            }
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error(error);
        }
    });
           
             return false;
        });
    });
 </script>
@endpush