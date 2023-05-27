@extends('user.events.layout')
@section('content')
    <div class="container">
    <div class="video-container">
            <div id="chapter1" class="video" style="background-color:black;">
                <iframe  allowfullscreen></iframe>
            </div>
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Notifications</h6>
            </div>
             <br>
             <br>
            </br></br>
             <hr>
                <div id="comments-container" class="comments">
                  <div class="comment-list">
                 @foreach ($events as $item)
                 <div class="comment">
                 <div class="comment-author">
                 <img src="{{ asset('img/'.$item->img)}}" alt="User Avatar" class="avatar">
                 <span class="author-name">{{ $item->name }}</span>
                 </div>
                 <div class="comment-body">
                   <p class="comment-text">{{ $item->contenu }}</p>
                    <span class="comment-date">Posted on {{ $item->created_at}}
                    @php $check=0 @endphp
                    @if(Auth::check())
                    @php
                    $check = App\Models\ReadEvent::checkEvent($item['id'])
                    @endphp
                    @endif
                    @if($check > 0) 
                        <a href="{{ route('dashboard.readevent', $item->id) }}"><input class="btn btn-success" style="width: 150px; height:30px; margin-left: 1150px; " value="has been read"/></a>
                    @else <a  href="{{ route('dashboard.readevent',$item->id) }}"> <input class="btn btn-danger" style="width: 100px; height:30px; margin-left: 1000px; " value="read more"/></a>
                    @endif
                    </span>
                </div>
                </div>
            @endforeach
            </div>
        </div>
</div>
@endsection