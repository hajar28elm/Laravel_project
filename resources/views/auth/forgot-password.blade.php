<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://www.techsmith.com/blog/wp-content/uploads/2019/06/caption-video-online-course.jpg');
            background-size: cover;
        }

        .login-form {
            width: 500px;
            margin: 0 auto;
            margin-top: 200px;
            padding: 20px;
            border-radius: 5px;
            background-color: rgba(50,205,50, 0.6);
        }

        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .login-form button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .login-form button:hover {
            opacity: 0.9;
        }
    </style>
</head>

   
   
   <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <body>
        <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form">
                 <form method="POST" action="{{ route('password.email') }}">
                   @csrf
                   <!-- Email Address -->
                   <div class="form-group">
                    <label for="email" :value="__('Email')"></label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                  </div>
                <x-button class="btn btn-primary">
                    {{ __('Email Password Reset Link') }}
                </x-button>
        </form>

