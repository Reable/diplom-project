@extends("layouts.app")

@section("title", "Портфолио")

@section("app")

<div class="container py-5">
    <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast">
        <a href="">
            Портфолио
        </a>
    </h2>

    <p class="w-full h-[3px] bg-contrast mt-6"></span>

    <div class="my-10 flex justify-between">
        <div class="w-full lg:w-[70%]">
            <div class="shadow-circle rounded-[10px] p-5 flex flex-col gap-2">
                <h2 class="sm:text-[24px] lg:text-[30px] font-extra color-contrast uppercase">ТЕРЁШИНА АННА СЕРГЕЕВНА</h2>
                <p class="color-contrast-2 text-[14px] sm:text-[16px] lg:text-[20px] font-medium"><span class="font-bold">Место работы:</span> Государственное профессиональное учреждение “Сосногорский технологический техникум”</p>
                <p class="color-contrast text-[14px] sm:text-[16px] lg:text-[20px] font-medium"><span class="font-bold">Должность:</span> заведующий отделением, преподаватель дисциплин профессионального цикла</p>
                <div class="color-contrast text-[14px] sm:text-[16px] lg:text-[20px] font-medium flex justify-between gap-5">
                    <p class="font-bold">Образование: </p>
                    <div class="flex flex-col gap-3">
                        <p>Высшее: ФГБОУ ВПО «Ухтинский государственный технический университет» г. Ухта, год окончания – 2014, специальность – Безопасность технологических процессов и производств, квалификация – инженер</p>
                        <p>Профессиональная переподготовка: ГОУДПО «Коми республиканский институт развития образования», г. Сыктывкар, 2017 г.</p>
                    </div>
                </div>
                <div class="">
                    <p class="color-contrast text-[14px] sm:text-[16px] lg:text-[20px] font-medium"> <span class="font-bold">Имеющаяся квалификационная категория:</span>
                        <a href="">Высшая квалификационная категория</a>
                    </p>
                </div>
            </div>
            <div class="mt-5 flex justify-between gap-5">
                <a href="{{route("qualifications_page")}}" class="w-[49%] font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-3 sm:py-6 shadow-circle rounded-[10px] flex justify-center items-center text-center">Повышение квалификации</a>
                <a href="{{route("competitions_page")}}" class="w-[49%] font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-3 sm:py-6 shadow-circle rounded-[10px] flex justify-center items-center text-center">Участие в олимпиадах</a>
            </div>
        </div>
        <div class="hidden lg:block lg:w-[27%]">
            <img src="{{asset("assets/images/main/portfolio_image.png")}}" class="w-full h-[230px] rounded-[10px]" alt="">
        </div>
    </div>
</div>

@endsection