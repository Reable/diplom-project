<header class="container mx-auto justify-between items-center pt-7 lg:py-5 flex">
    <a href="{{ route('main_page') }}" class="w-[150px] sm:w-[30%]">
        <img src="{{asset('assets/images/logo.svg')}}" alt="">
    </a>
    <nav class="w-[60%] justify-between hidden lg:flex">
        <a href="{{route('main_page')}}" class="font-semi text-[16px] color-contrast">Главная</a>
        <a href="{{route('portfolio_page')}}" class="font-semi text-[16px] color-contrast">Портфолио</a>
        <a href="{{route('albums_page')}}" class="font-semi text-[16px] color-contrast">Фотогалерея</a>
        <a href="{{route('groups_page')}}" class="font-semi text-[16px] color-contrast">Учебные материалы</a>
        <a href="#feedback" class="font-semi text-[16px] color-contrast">Обратная связь</a>
    </nav>
    <nav id="header-modal" class="flex flex-col gap-[10px] lg:hidden cursor-pointer">
        <p class="bg-contrast w-[40px] h-[3px]"></p>
        <p class="bg-contrast w-[40px] h-[3px]"></p>
        <p class="bg-contrast w-[40px] h-[3px]"></p>
    </nav>
</header>

<div id="mobile-nav" class="mobile-nav">
    <img src="{{ asset("assets/close_sidebar.svg") }}" id="close-mobile-nav" class="absolute top-5 right-4 w-[50px] h-[50px]"></img>
    <a href="{{route('main_page')}}">Главная</a>
    <a href="{{route('albums_page')}}">Фотогалерея</a>
    <a href="{{route('portfolio_page')}}">Портфолио</a>
    <a href="{{route('groups_page')}}">Учебные материалы</a>
    <a href="#feedback">Обратная связь</a>
</div>
