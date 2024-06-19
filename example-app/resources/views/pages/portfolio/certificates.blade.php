@extends("layouts.app")

@section("title", "Достижения")

@section("app")

<div class="container py-5">
    <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast">
        <a href="{{route("portfolio_page")}}">
            Достижения
        </a>
    </h2>

    <p class="w-full h-[3px] bg-contrast mt-6"></span>

    <div class="my-10">
        @if(isset($certificates) && count($certificates))
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-14">
                @foreach($certificates as $certificate)
                    <div class="sm:w-[200px] lg:w-[240px] px-3 sm:px-7 py-3 sm:py-6 lg:py-10 rounded-[10px] shadow-circle bg-[#fff] flex flex-col items-center justify-between gap-10">
                        <img src="{{asset("storage/" . $certificate["path_url"])}}" class="w-[100px] sm:w-[150px]" alt="">
                        <p class="font-semi text-[12px] sm:text-[16px] color-contrast">{{ $certificate['title'] }}</p>
                    </div>
                @endforeach
            </div>
        @else 
            <div class="flex flex-col gap-5 mt-10">
                <p class="font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-6 shadow-circle rounded-[10px] flex justify-center items-center text-center">В данный момент сертификаты не загруженны</h1>
                <div class="flex justify-end">
                    <a href="{{ route("main_page")}}" class="w-[200px] font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-4 shadow-circle rounded-[10px] flex justify-center items-center text-center">Назад</a>
                </div>
            </div>
        @endif
    
    </div>
</div>

@endsection