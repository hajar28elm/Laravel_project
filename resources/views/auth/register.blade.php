<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://www.techsmith.com/blog/wp-content/uploads/2019/06/caption-video-online-course.jpg');
            background-size: cover;
        }

        .signup-form {
            width: 500px;
            margin: 0 auto;
            margin-top: 200px;
            padding: 20px;
            border-radius: 5px;
            background-color: rgba(50,205,50, 0.5);
        }

        .signup-form input[type="text"],
        .signup-form input[type="email"],
        .signup-form input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .signup-form button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .signup-form button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <body>
         <div class="container">
           <div class="row">
              <div class="col-md-4 offset-md-4">
                 <div class="signup-form">
                     <h2 class="text-center">Sign Up</h2>
                     <form method="POST" action="{{ route('register') }}">
                    @csrf

                <!-- Name -->
                <div class="form-group">
                <label for="name" :value="__('Name')">Name</label>
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Email Address -->
            <div class="form-group">
                <label for="email" :value="__('Email')">Email</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>
            <!-- Password -->
            <div class="form-group">
                <label for="password" :value="__('Password')">Password</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation" :value="__('Confirm Password')">Confirm Password</label>

                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button class="btn btn-primary">
                    {{ __('Register') }}
                <button>
            </div>
        </form>
    </body>
 