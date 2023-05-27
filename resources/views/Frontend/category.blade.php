@extends('Frontend.layoutCat')
@section('content')
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
                <h1 class="mb-5">{{$category->name}}</h1>
            </div>
            <div class="row g-4">
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
@endsection
