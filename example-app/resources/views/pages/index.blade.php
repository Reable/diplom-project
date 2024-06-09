@extends('layouts.app')

@section("app")
    <div class="main">
        <div class="flex justify-between container py-16 sm:py-20">
            <div class="w-full text-center lg:text-left lg:w-[40%] xl:w-[45%] flex flex-col gap-3">
                <h1 class="font-extra leading-7 sm:leading-[40px] color-contrast"><span class="text-[30px] sm:text-[35px] lg:text-[40px] xl:text-[45px]">ТЕРЁШИНА</span><br><span class="text-[25px] sm:text-[30px] lg:text-[40px] xl:text-[40px]">АННА СЕРГЕЕВНА</span></h1>
                <h3 class="font-bold text-[18px] lg:text-[22px] xl:text-[24px] leading-6 sm:leading-8 color-contrast-2">Заведующий отделением, <br> преподаватель дисциплин профессионального цикла</h3>
                <p class="font-semi text-[12px] lg:text-[16px] leading-5 sm:leading-8 color-contrast">
                    Здесь вы найдёте полезные материалы, информацию о курсах и консультациях, а также сможете связаться со мной для обсуждения сотрудничества. <br>
                    Я помогу вам достичь успеха в обучении и профессиональной деятельности. Давайте начнём вместе!
                </p>
            </div>
            <div class="hidden lg:block w-[50%] xl:w-[45%]">
                <img src="{{asset("assets/images/main/main_image.png")}}" class="w-full h-full" alt="">
            </div>
        </div>
        @if(isset($works) && count($works))
            <div class="container pb-20">
                <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast uppercase">Методические работы</h2>
                <div class="flex justify-between mt-10 sm:mt-14 horizontal-media-scroller pt-3 pb-7 px-5 lg:px-0 lg:gap-3">
                    @foreach ($works as $work)
                        <a href="" class="w-[200px] sm:w-[250px] lg:w-[270px] px-3 sm:p-7 rounded-[10px] shadow-circle bg-[#fff] flex flex-col items-center justify-between gap-10 transition-all hover:scale-[1.02] text-center lg:text-left">
                            <img src="{{asset("assets/images/main/methodical_work.svg")}}" class="w-[100px] lg:w-[150px]" alt="">
                            <p class="font-semi text-[14px] lg:text-[16px] color-contrast">{{ $work['title'] }}</p>
                        </a>
                    @endforeach
                </div>
                <div class="flex justify-end mt-10">
                    <a href="" class="font-semi text-[14px] sm:text-[16px] color-contrast">Подробнее</a>
                </div>
            </div>
        @endif
        @if(isset($photos) && count($photos))
            <div class="container pb-20">
                <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast uppercase">Фотогалерея</h2>
                <div class="flex justify-between mt-10 sm:mt-14 lg:flex-wrap lg:gap-10 gap-10 snap-mandatory overflow-x-auto">
                    @foreach($photos as $photo)
                        <img src="{{asset("storage/$photo")}}" loading="lazy" alt="" class="w-[250px] rounded-[10px] lg:w-[30%]">
                    @endforeach
                </div>
                <div class="flex justify-end mt-10">
                    <a href="" class="font-semi text-[14px] sm:text-[16px] color-contrast">Подробнее</a>
                </div>
            </div>
        @endif
        @if(isset($certificates) && count($certificates))
            <div class="container pb-20">
                <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast uppercase">Достижения</h2>
                <div class="mt-10 sm:mt-14 horizontal-media-scroller p-5">
                    @foreach($certificates as $certificate)
                        <div class="w-[240px] px-7 py-10 rounded-[10px] shadow-circle bg-[#fff] flex flex-col items-center justify-between gap-10">
                            <img src="{{asset("storage/" . $certificate["path_url"])}}" class="w-[100px] sm:w-[150px]" alt="">
                            <p class="font-semi text-[14px] sm:text-[16px] color-contrast">{{ $certificate['title'] }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-end mt-10">
                    <a href="" class="font-semi text-[14px] sm:text-[16px] color-contrast">Подробнее</a>
                </div>
            </div>
        @endif
    </div>
@endsection