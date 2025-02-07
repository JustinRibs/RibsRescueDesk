<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/4230/4230745.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/png" sizes="167x167" href="https://cdn-icons-png.flaticon.com/512/4230/4230745.png"> 
<link rel="apple-touch-icon" type="image/png" sizes="180x180" href="https://cdn-icons-png.flaticon.com/512/4230/4230745.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Ribs Rescue Desk</title>
</head>
<body class="bg-theme2">
    <x-header/>
    {{ $slot }}
</body>
</html>
