<!-- resources/views/admin/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Your header content here -->
        <h1>Admin Panel</h1>
        <nav>
            <ul>
                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <!-- Your footer content here -->
        <p>&copy; {{ date('Y') }} Your Company</p>
    </footer>
</body>
</html>
