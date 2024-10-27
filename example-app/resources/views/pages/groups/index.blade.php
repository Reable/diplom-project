@extends('layouts.app')

@section("title", "Учебные дисциплины")

@section("app")

    <div class="container py-10 pb-20">
        <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast">Учебные материалы</h2>

        <p class="w-full h-[3px] bg-contrast mt-10"></span>

        @if(count($data) > 0)
            <div class="mt-10">
                @if(isset($data[1]))
                    <div class="text-left font-bold text-[16px] sm:text-[18px] lg:text-[25px] color-contrast">
                        <h3>Очная форма</h3>
                    </div>
                    <div class="mt-10 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8">
                        @foreach($data[1] as $group)
                            <a href="{{route("groups_training_sessions_page", $group["id"])}}"
                            class="w-full sm:w-[250px] lg:w-[250px] p-3 sm:p-7 rounded-[10px]
                            shadow-circle bg-[#fff] flex flex-col items-center justify-between gap-10 transition-all hover:scale-[1.02] text-center lg:text-left">
                                <img src="{{asset("storage/".$group["path_url"])}}" class="w-full h-[110px] lg:w-full lg:h-[130px] rounded-[10px]" alt="">
                                <p class="font-semi text-[10px] lg:text-[16px] color-contrast">{{ $group['title'] }}</p>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="mt-16" id="default">
                @if(isset($data[2]))
                    <div class="text-left font-bold text-[16px] sm:text-[18px] lg:text-[25px] color-contrast">
                        <h3>Заочная форма</h3>
                    </div>
                    <div class="mt-10 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8">
                        @foreach($data[2] as $group)
                        <a href="{{route("groups_training_sessions_page", $group["id"])}}"
                        class="w-full sm:w-[250px] lg:w-[250px] p-3 sm:p-7 rounded-[10px]
                        shadow-circle bg-[#fff] flex flex-col items-center justify-between gap-10 transition-all hover:scale-[1.02] text-center lg:text-left">
                            <img src="{{asset("storage/".$group["path_url"])}}" class="w-full h-[110px] lg:w-full lg:h-[130px] rounded-[10px]" alt="">
                            <p class="font-semi text-[14px] lg:text-[16px] color-contrast">{{ $group['title'] }}</p>
                        </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @else 
        <div class="flex flex-col gap-5 mt-10">
            <p class="font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-6 shadow-circle rounded-[10px] flex justify-center items-center text-center">В данный момент дисциплин не добавленно</h1>
            <div class="flex justify-end">
                <a href="{{ route("main_page")}}" class="w-[200px] font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-4 shadow-circle rounded-[10px] flex justify-center items-center text-center">Назад</a>
            </div>
        </div>
        @endif
    </div>

@endsection