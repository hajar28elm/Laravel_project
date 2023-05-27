@extends('user.master')
@section('content')
<!-- courses Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Wishlist</h6>
                <h1 class="mb-5">My WishList</h1>
            </div>
            <div class="row g-4">
            @php
            $i = 0.1;
            @endphp
            <p style="font-size: 1.5em;">My savings are: <span class="badge badge-danger text-danger" style="font-size: 1.5em;"> {{ count($wishlists) }}</span></p>
            @foreach($wishlists as $item)
                <div class="col-lg-12 col-sm-6 wow fadeInUp" data-wow-delay="{{$i}}s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5>{{$item->course->nom}}</h5>
                            <p>{{$item->course->longdescription}}</p>
                            <a class="btn btn-primary  px-5 mt-2" href="{{ route('course.details', ['id' => $item->course_id]) }}">Read More</a>
                            &nbsp &nbsp &nbsp
                            <div id="notifDiv">
                            @php $countWishlist =0 @endphp
                              @if(Auth::check())
                              @php
                              $countWishlist = App\Models\Wishlist::countWishlist($item['course_id'])
                              @endphp
                              @endif
                               <a href="#" data-courseid="{{ $item->course_id}}" class="update_wishlist">
                                @if( $countWishlist >0 )<i class="fas fa-heart px-5 text-danger" style="font-size: 1.5em;"></i></a>
                                @else <i class="far fa-heart px-5 text-danger" style="font-size: 1.5em;"></i> </a>
                                @endif
                             </div>
                        </div>
                    </div>
                </div>
                @php
                $i =$i+0.3;
                @endphp
                @endforeach
            </div>
        </div>
    </div> 
    <!-- courses End -->
<!-- <p>the header tag should match the request that we generated from the ajax</p> -->
@endsection
@push('javascript')
 <script>
totalWishlist();
    function totalWishlist(){
        $.ajax({
            type : 'GET',
            url :  '/user/dashboard/total_wishlist',
            success: function(response){
                var response =JSON.parse(response); //convert to an javascript object
                $('.total_wishlist').text(response);

            }
        })
    }
    var student_id = {{ Auth::user()->id }}
    $(document).ready(function(){
        $('.update_wishlist').click(function(){
            
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                
            });
            var course_id = $(this).data('courseid');
            $.ajax({
                type: 'POST',
                url: '/user/dashboard/update_wishlist',
                data: {
                    course_id: course_id,
                    student_id: student_id
                },
                success: function(response){
                  if(response.action == 'add'){
                    totalWishlist();
                    $('a[data-courseid='+course_id+']').html(`<i class="fas fa-heart px-5 text-danger" style="font-size: 1.5em;"></i>`);
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background','green');
                    $('#notifDiv').text(response.message);
                    setTimeout(() => {$('#notifDiv').fadeOut();},3000);
                  } else if (response.action == 'remove'){
                    totalWishlist();
                    $('a[data-courseid='+course_id+']').html(`<i class="far fa-heart px-5 text-danger" style="font-size: 1.5em;"></i>`);
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background','red');
                    $('#notifDiv').text(response.message);
                    setTimeout(() => {$('#notifDiv').fadeOut();},3000);
                  }
                  
                }
            });
             return false;
        });
    });
 </script>
@endpush