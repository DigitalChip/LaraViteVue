<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    @vite('resources/scss/app.scss')
</head>
<body>
    <h1>HELLO WORLD</h1>
    <hr>
    <div id="app">
        
    </div>
    @vite('resources/js/app.js')
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>
</html>