@extends('layouts.app')

@section("title", "Учебные дисциплины")

@section("app")

    <div class="container py-10">
        <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast">
            <a href="{{ route("groups_page")}}">
                Учебные материалы
            </a>
        </h2>

        <h3 class="mt-0 font-extra text-[20px] sm:text-[30px] lg:text-[24px] color-contrast">
            <a href="{{ route("groups_training_sessions_page", [$group["id"]] )}}">
                {{ $group["title"] }}
            </a> |
            <a href="{{ route("groups_materials_select_page", [$group["id"], $session["id"]] )}}">
                {{ $session["title"] }}
            </a>
        </h3>

        <p class="w-full h-[3px] bg-contrast mt-6"></span>

        <div class="mt-10">
            <div class="mt-10 flex justify-between flex-wrap gap-8 sm:gap-0">
                <a href="{{ route("groups_theoretical_materials_page", [$group["id"], $session["id"]])}}"
                class="font-medium text-[14px] sm:text-[20px] color-contrast w-full sm:w-[48%] px-3
                py-4 sm:py-6 shadow-circle rounded-[10px] flex justify-center items-center text-center">Теоретические материалы</a>

                <a href="{{route("groups_practical_materials_page", [$group["id"], $session["id"]] )}}"
                class="font-medium text-[14px] sm:text-[20px] color-contrast w-full sm:w-[48%] py-4
                sm:py-6 shadow-circle rounded-[10px] flex justify-center items-center text-center">Практические работы</a>
            </div>
        </div>
    </div>
@endsection