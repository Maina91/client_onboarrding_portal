<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .oval-btn {
            padding: 12px 30px;
            border: none;
            background-color: #1E40AF;
            color: white;
            font-size: 16px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .oval-btn:hover {
            background-color: #140246;
        }

        .oval-btn:focus {
            outline: none;
        }

        .menu-item {
            display: flex;
            align-items: center;
            margin: 0 15px;
        }

        .badge i {
            font-size: 24px;
        }

        .text-white {
            color: white;
        }

        .text-white:hover {
            color: #e0e0e0;
        }

        .application-page-menu {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-link {
            font-size: 18px;
            font-weight: 500;
        }

        .menu-item.selected {
            border-bottom: 2px solid white;
            /* Adjust the color and thickness as needed */
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .application-page-menu {
                flex-direction: column;
                align-items: center;
            }

            .menu-item {
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Header Section -->
    <div class="flex justify-between p-4 bg-white shadow-md">
        <div class="text-black text-lg font-semibold">Client Portal</div>
        <div>
            <button onclick="location.href='/about'" class="oval-btn mr-4">About Us</button>
            <button onclick="location.href='/'" class="oval-btn">Login</button>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="bg-blue-600 p-4 shadow-md">
        <div class="application-page-menu">
            <!-- Start Registration -->
            <div class="menu-item {{ request()->is('register') ? 'selected' : '' }}">
                <span class="badge text-white"><i class="fas fa-user-plus"></i></span>
                <a href="{{ route('/register') }}" class="text-white nav-link hover:text-gray-300">Start
                    Registration</a>
            </div>

            <!-- Personal Information -->
            <div class="menu-item {{ request()->is('biodata') ? 'selected' : '' }}">
                <span class="badge text-white">
                    <i class="fas fa-id-card"></i>
                </span>
                <a href="{{ route('/biodata') }}" class="text-white nav-link hover:text-gray-300">Personal
                    Information</a>
            </div>

            <!-- Finalize Registration -->
            <div class="menu-item {{ request()->is('finalize') ? 'selected' : '' }}">
                <span class="badge text-white">
                    <i class="fas fa-check-circle"></i>
                </span>
                <a href="{{ route('/finalize') }}" class="text-white nav-link hover:text-gray-300">Finalize
                    Registration</a>
            </div>

            <!-- Make Deposit -->
            <div class="menu-item {{ request()->is('payment') ? 'selected' : '' }}">
                <span class="badge text-white">
                    <i class="fas fa-wallet"></i>
                </span>
                <a href="{{ route('/payment') }}" class="text-white nav-link hover:text-gray-300">Make Deposit</a>
            </div>
        </div>
    </nav>


    <!-- Main Content Section -->
    <div class="container mx-auto mt-10">

        <div>
            <a href="{{ url()->previous() }}" class="go-back"><i class="fa-solid fa-arrow-left"></i>GO BACK</a>
        </div>

        @yield('content')
    </div>

    <!-- Footer Section -->
    <footer class="bg-blue-600 text-white text-center p-4 mt-10">
        <p>&copy; 2025 Client Portal. All rights reserved.</p>
    </footer>

</body>

</html>
