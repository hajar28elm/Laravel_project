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
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <body>
        <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form">
                    <h2 class="text-center">Admin Login</h2>
        <form method="POST" action="{{ route('admin.adminlogin') }}">
            @csrf
            <div class="form-group">
            <!-- Email Address -->
                <label for="email" :value="__('Email')">Email</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" :value="__('Password')">Password</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="form-group">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="btn btn-primary">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </body>
