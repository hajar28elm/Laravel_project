<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            overflow: hidden; /* Prevent horizontal scroll */
        }

        .container {
            max-width: 2000px;
            margin: 0 auto;
            padding: 40px;
        }

        .test-card {
            position: relative;
            background-color: rgba(243, 192, 127, 0.8);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .test-card:hover {
            transform: scale(1.05);
        }

        .laptop-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            animation: zoomInOut 4s ease-in-out infinite alternate;
            z-index: -1;
        }

        @keyframes zoomInOut {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
    <title>Available Tests</title>
</head>
<body>
    <div class="container">
        <img src="https://hearttreasure.net/wp-content/uploads/2018/08/testyourself.jpg" alt="Laptop Image" class="laptop-image">
        @foreach($tests as $item)
        <div class="card mb-4 test-card">
            <div class="card-body">
                <h3 class="card-title">{{ $item->title }}</h3>
                <p class="card-text">{{ $item->description }}</p>
                <a href="{{ route('dashboard.passtest', $item->id) }}" class="card-link">Pass Test</a>
            </div>
        </div>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
