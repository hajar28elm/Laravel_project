@extends('Frontend.master')
@section('content')
<!-- courses Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Our Courses</h1>
            </div>
            <div class="row g-4" id="course-results">
            @php
            $i = 0.1;
            @endphp
            @foreach($courses as $item)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="{{$i}}s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5>{{$item->nom}}</h5>
                            <p>{{$item->description}}</p>
                            <a class="btn btn-primary py-1 px-5 mt-2" href="{{ route('course.details', ['id' => $item->id]) }}">Discover the course</a>
                            &nbsp &nbsp &nbsp
                            <h6> {{ $item->inscriptions->count()}} students</h6>
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
    
    <!-- Popular courses Start -->
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Popular Courses</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                    @foreach($courses as $item)
                        @if($item->id == 1)
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{$item->logo}}" alt="" width="600">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">{{$item->solde}}% OFF</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">{{$item->nom}}</div>
                            </a>
                        </div>
                        @endif
                        @if($item->id == 3)
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{$item->logo}}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">{{$item->solde}}% OFF</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">{{$item->nom}}</div>
                            </a>
                        </div>
                        @endif
                        @if($item->id == 4)
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{$item->logo}}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">{{$item->solde}}% OFF</div>
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">{{$item->nom}}</div>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @if($item->id == 8)
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{$item->logo}}" alt="" style="object-fit: cover;">
                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">{{$item->solde}}% OFF</div>
                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">{{$item->nom}}</div>
                    </a>
                </div>
                @endif
            @endforeach
            </div>

        </div>
    </div>
    <!-- Destination Start -->


    <!-- Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Ur Process in LearnIt</h6>
                <h1 class="mb-5">3 Easy Steps</h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-laptop fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Choose A Course</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Expand your knowledge and skills by choosing from our wide range of courses. Whether you're interested in technology, languages, or any other field, we have the perfect course for you.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-dollar-sign fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Pay Online</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Experience the convenience of paying online. Our secure payment process ensures a smooth transaction. Say goodbye to cash handling and enjoy the benefits of online payments</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-graduation-cap fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Enjoy Learning</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Get ready to dive into a world of knowledge and discovery. Our platform offers you a rich learning experience, filled with engaging content, interactive lessons, and expert guidance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process Start -->
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3"> The founder</h6>
                <h1 class="mb-5">Meet Our Founder</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('img/hajar.jpg')}}" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Hajar EL MOTAYIQ</h5>
                            <small>Im Hajar EL MOTAYIQ the founder of this website i hope u like it, if u have any questions,i'll be glad to answer</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                  @foreach($stories as $item)
                 <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{asset('img/'.$item->student->img)}}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">{{ $item->student->name}}</h5>
                    <p>{{ $item->student->email}}</p>
                    <p class="mb-0">{{$item->contenu}}</p>
                  </div>
                  @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    @endsection
    @push('javascript')
 <script>
     $(document).ready(function(){
        var searchInput = $('#course-search');
        var courseResults = $('#course-results');
        function searchCourses() {
        var query = searchInput.val();
         $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                
            });
          $.ajax({
               url: '/search',
               method: 'GET',
               data: { query: query },
               dataType: 'json',
               success: function(response) {
                  courseResults.empty();
                  response.courses.forEach(function(course) { 
                   var courseElement = ` @php
                                         $i = 0.1;
                                         @endphp
                                     <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="{{$i}}s">
                                           <div class="service-item rounded pt-3">
                                             <div class="p-4">
                                             <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                                             <h5>${course.nom}</h5>
                                             <p>${course.description}</p>
                                             <a class="btn btn-primary py-1 px-5 mt-2" href="/course/details/${course.id}">Discover the course</a>
                                             &nbsp &nbsp &nbsp
                                         </div>
                                     </div>
                                    </div>
                                    @php
                                    $i =$i+0.3;
                                    @endphp`
                  courseResults.append(courseElement);
          });
        },
            error: function(xhr, status, error) {
             console.error(error);
        }
      });
    }
    searchInput.on('input', function() {
      searchCourses();
    });
       
});
 </script>
@endpush