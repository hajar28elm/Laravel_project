<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Course Details</title>
    <style>
          body {
            background: linear-gradient(to bottom, #84E7BD, white); /* Replace the colors with your desired gradient */
        }
        .course-image {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="{{$course->logo}}" alt="Course Image" class="course-image">
            </div>
            <div class="col-md-6">
              <form action="{{ route('dashboard.course.join',['course_id' => $course->id]) }}" method="POST">
              @method('POST')
              @csrf
                <h2>{{ $course->nom }}</h2>
                <p>Price: {{ $course->prix }}$</p>
                <p>Sale: {{ $course->solde }}$</p>
                <p> {{ $course->longdescription }}</p>
                @if(auth()->check())
                <p>Vous êtes connecté.</p>
                <button type="submit" class="btn btn-primary">Join Course</button>
                @else
                <a href="{{ route('login') }}" class="btn btn-primary">Join Course</a>
                @endif
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h3>Course Chapters</h3>
                <ul class="list-group">
            @foreach ($chapters as $item)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-6">
                        <h5>{{ $item->name }}</h5>
                        <p>{{ $item->description }}</p>
                    </div>
                    <div class="col-md-6">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="chapter1Dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Lessons
                            </button>
                            <div class="dropdown-menu" aria-labelledby="chapter1Dropdown">
                                @foreach ($item->lessons as $lesson)
                                <a class="dropdown-item">{{ $lesson->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
