<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Login</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-link {
            text-align: center;
            display: block;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="login-form-container">
        <form action="{{route('auth.login')}}" method="POST">
            <x-alert-box />
            <h4 class="form-title">Please Login</h4>
            <x-textfield type="email" name="email" label="Email Address" placeholder="Please enter your email" />
            <x-textfield type="password" name="password" label="Password" placeholder="Please enter your password" />
            @csrf 
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <a href="{{route('auth.register')}}" class="register-link">Don't have an account? Click here to create one</a>
        </form>
    </div>
</body>
</html>
