<header class="container mx-auto justify-between items-center pt-7 lg:py-5 flex">
    <div class="w-[150px] sm:w-[30%]">
        <img src="{{asset("assets/images/logo.svg")}}" alt="">
    </div>
    <nav class="w-full justify-between hidden lg:flex">
        <a href="{{route("main_page")}}" class="font-semi text-[16px] color-contrast">главная</a>
        <a href="{{route("main_page")}}" class="font-semi text-[16px] color-contrast">портфолио</a>
        <a href="{{route("main_page")}}" class="font-semi text-[16px] color-contrast">библиотека</a>
        <a href="{{route("main_page")}}" class="font-semi text-[16px] color-contrast">методические работы</a>
        <a href="{{route("main_page")}}" class="font-semi text-[16px] color-contrast">обратная связь</a>
    </nav>
    <nav id="header-modal" class="flex flex-col gap-[10px] lg:hidden">
        <p class="bg-contrast w-[40px] h-[3px] border-none"></span>
        <p class="bg-contrast w-[40px] h-[3px] border-none"></span>
        <p class="bg-contrast w-[40px] h-[3px] border-none"></span>
    </nav>

    </nav>
</header>