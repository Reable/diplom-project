<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-body flex flex-col min-h-[100vh]">
    @include('components.header')

    <div id="app" style="flex: 1 0 auto;">
        @yield("app")
    </div>

    @include('components.footer')
</body>
</html>