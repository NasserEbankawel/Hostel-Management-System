<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Register</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light grey background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-form-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="register-form-container">
        <form action="{{ route('auth.register.post') }}" method="POST">
            @csrf
            <h4 class="form-title">Create an Account</h4>

            <!-- Full Name Input -->
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" 
                       value="{{ old('fullname') }}" placeholder="Enter Full Name" required>
                @error('fullname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" 
                       value="{{ old('email') }}" placeholder="Enter Email" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label">User Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" 
                       placeholder="Enter a user password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password Input -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" 
                       placeholder="Confirm password" required>
            </div>

            <!-- Hidden Input for Role -->
            <input type="hidden" name="role" value="admin">

            <!-- Submit Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
