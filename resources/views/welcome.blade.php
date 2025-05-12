<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Plant Inventory</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <script>
            window.location.href = "{{ route('login') }}"; // Redirect to login page
        </script>
    </body>
</html>
