<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LearnIt - website for online courses</title>
    <base href="{{ \URL::to('/') }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Add your CSS stylesheets here -->
    <style>
        .container {
            display: flex;
            flex-direction: row;
        }
        .chapters {
           flex-shrink: 0;
          width: 300px;
         padding-left: 10px;
    /* position: fixed; */
        }
        body{
    background:#C2ECE8;
}
        .video-container {
            flex: 2;
        }
        .video {
            /* position: relative; 
            padding-bottom: 56.25%;
            overflow: hidden; */
        }
        .video iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 10px;
            height: 10px;
        }
        textarea {
            width: 100%;
            height: 100px;
        }

        .chapter-list {
            list-style-type: none;
            padding: 0;
        }
        .chapter-list li {
            margin-bottom: 10px;
        }
        .comment {
          margin-bottom: 20px;
          border-bottom: 3px solid green;
          padding-bottom: 10px;
}

.comment-list {
  margin-top: 10px;
}
hr {
        border: none;
        border-top: 3px solid black;
    }
.comment-author {
  display: flex;
  align-items: center;
  margin-bottom: 5px;
}
.reply-author {
  display: flex;
  align-items: center;
  margin-bottom: 5px;
}

.avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-right: 10px;
}

.author-name {
  font-weight: bold;
  font-size:14px;
  color:green;
}

.comment-date {
  font-size: 12px;
  color: gray;
}

.comment-text {
  margin-top: 5px;
  font-size:20px;
  color: black;
}
.author-name-reply {
  font-weight: bold;
  font-size:14px;
  color:green;
}

.reply-date {
  font-size: 12px;
  color: gray;
}

.reply-text {
  margin-top: 5px;
  font-size:20px;
  color: black;
}
.btn-primary {
  margin-top: 10px;
}
    </style>
</head>

<body>
     @yield('content')
    <!-- Footer Start -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    @stack('javascript')
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>