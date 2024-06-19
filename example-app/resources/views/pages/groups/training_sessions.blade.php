@extends('layouts.app')

@section("app")

    <div class="container py-10">
        <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast">
            <a href="{{ route("groups_page")}}">
                Учебные материалы
            </a>
        </h2>
        <h3 class="mt-0 font-extra text-[20px] sm:text-[30px] lg:text-[24px] color-contrast">
            <a href="{{ route("groups_training_sessions_page", $group["id"])}}">
                {{ $group["title"] }}
            </a>
        </h3>

        <p class="w-full h-[3px] bg-contrast mt-10"></span>

        <div class="mt-10">
            @if(isset($sessions[0]))
                <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($sessions as $session)
                        <a href="{{ route("groups_materials_select_page", [$group["id"], $session["id"]])}}"
                         class="font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-4 sm:py-6 shadow-circle rounded-[10px] flex justify-center items-center text-center">{{ $session["title"] }}</a>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col gap-5">
                    <p class="font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-6 shadow-circle rounded-[10px] flex justify-center items-center text-center">В данный момент предметов не добавленно</h1>
                    <div class="flex justify-end">
                        <a href="{{ route("groups_page")}}" class="w-[200px] font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-4 shadow-circle rounded-[10px] flex justify-center items-center text-center">Назад</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection