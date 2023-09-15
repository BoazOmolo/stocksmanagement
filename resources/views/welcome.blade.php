<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Point of Sale System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for styling -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-dark .navbar-brand {
            color: #ffffff;
        }

        .container {
            padding-top: 2rem;
        }

        .jumbotron {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2rem;
            color: #343a40;
        }

        .feature-heading {
            font-size: 1.5rem;
            color: #343a40;
        }

        .feature-description {
            font-size: 1rem;
            color: #6c757d;
        }
    </style>
</head>
<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4">Elevate Your Business with Our Point of Sale System</h1>
                <p class="lead">Our modern and efficient Point of Sale (POS) system is designed to streamline your business operations and enhance customer experience.</p>
            </div>

            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="bi bi-cash feature-icon"></i>
                    </div>
                    <h2 class="feature-heading">Efficient Transactions</h2>
                    <p class="feature-description">Process transactions quickly and accurately, reducing wait times for customers and improving cashier efficiency.</p>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="bi bi-graph-up feature-icon"></i>
                    </div>
                    <h2 class="feature-heading">Real-time Analytics</h2>
                    <p class="feature-description">Gain valuable insights into your sales, inventory, and customer behavior with our real-time analytics tools.</p>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="bi bi-bag-check feature-icon"></i>
                    </div>
                    <h2 class="feature-heading">Inventory Management</h2>
                    <p class="feature-description">Keep track of your stock levels, automate reordering, and minimize stockouts with our advanced inventory management features.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and Popper.js (for Bootstrap features like dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
