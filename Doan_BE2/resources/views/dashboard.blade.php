<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Products</title>
</head>
<body>
    <header>

        <nav>
            <a href="{{ route('products.list') }}">Products</a>
            
        </nav>
    </header>
    <div class="container">
        @yield('content')
    </div>      
</body>
</html>