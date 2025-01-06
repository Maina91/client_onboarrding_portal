<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Portal - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: #fff;
            font-family: Arial, sans-serif;
            min-height: 100vh;
        }

        .card {
            background: #fff;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-primary:hover {
            background-color: #3b5dbf;
            border-color: #3b5dbf;
        }

        .header {
            text-align: center;
            padding: 50px 20px;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .form-label {
            font-weight: 500;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Welcome to the Client Portal</h1>
        </div>

        <!-- Login and Create Account Forms -->
        <div class="row justify-content-center">
            <!-- Login Form -->
            <div class="col-md-4">
                <div class="card p-4 mb-3">
                    <h4 class="text-center">Login</h4>
                    <form method="POST" action="{{ route('/login') }}">
                        @csrf
                        <div class="mb-3">
                            <p>New user? <a href="{{ route('/register') }}">Create an account</a></p>

                            <label for="emailLogin" class="form-label">Username or Email</label>
                            <input type="email" class="form-control" id="emailLogin" name="email"
                                placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="passwordLogin" class="form-label">Password</label>
                            <input type="password" class="form-control" id="passwordLogin" name="password"
                                placeholder="Enter your password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} Client Portal. All Rights Reserved.</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
