<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Добрый день, меня зовут Терёшина Анна Сергеевна и мой сайт поможет вам в поиском нужных вам конспектов">
    <meta name="keywords" content="Терёшина, терёшина, Анна Сергеевна, анна сергеевна, аннушка, Аннушка, управление проектами, конспекты, ГПОУ СТТ, СТТ, стт, Сосногорский технологический техникум, Сосногорск, Техникум, Личный сайт преподавателя" />
    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset("assets/logo.png") }}" type="image/png">
    <title>@yield("title")</title>
</head>
<body class="bg-body flex flex-col min-h-[100vh]">
    @include('components.header')

    <div id="app" style="flex: 1 0 auto;">
        @yield("app")
    </div>

    @include('components.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const headerModal = document.getElementById('header-modal');
            const mobileNav = document.getElementById('mobile-nav');
            const closeMobileNav = document.getElementById("close-mobile-nav");

            headerModal.addEventListener('click', function() {
                mobileNav.classList.toggle('active');
            });

            // Закрытие меню при клике на ссылку
            mobileNav.addEventListener('click', function(event) {
                if (event.target.tagName === 'A') {
                    mobileNav.classList.remove('active');
                }
            });

            closeMobileNav.addEventListener('click', function() {
                mobileNav.classList.remove('active');
            });
        });

    </script>
</body>
</html>