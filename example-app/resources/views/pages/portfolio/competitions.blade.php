@extends("layouts.app")

@section("title", "Участие в конкурсах")

@section("app")

<div class="container py-5">
    <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast">
        <a href="{{route("portfolio_page")}}">
            Участие в конкурсах
        </a>
    </h2>

    <p class="w-full h-[3px] bg-contrast mt-6"></span>

    <div class="my-10 flex flex-col gap-5">
        @foreach($data as $key => $qualifications)
            <div class="shadow-circle rounded-[10px] p-5">
                <h3 class="font-bold text-[18px] sm:text-[30px] lg:text-[30px] color-contrast">{{ $key }}</h3>
                <p class="w-full h-[3px] bg-contrast mt-6"></span>

                <div class="mt-5 flex flex-col gap-5 font-medium text-[12px] sm:text-[17px] lg:text-[20px] color-contrast">
                    @foreach($qualifications as $elem)
                        <div class="shadow-circle rounded-[10px] p-3 flex flex-col gap-10 sm:gap-5">
                            <div class="flex gap-2">
                                <p>{{ $elem["order"] }}.</p>
                                <p>
                                    {{$elem["title"]}}. <span class="font-bold">Компетенция: {{ $elem["competition"] }}</span>
                                </p>
                            </div>
                            <div class="flex-col sm:flex-row flex items-center gap-3 sm:gap-5 font-bold">
                                <p class="w-[100%] sm:w-auto px-9 py-2 shadow-circle rounded-[10px]">
                                    {{ $elem["position"] }}
                                </p>
                                <a href="" class="w-[100%] sm:w-auto text-white bg-contrast px-9 py-2 shadow-circle rounded-[10px]">
                                    {{ $elem["place_title"] }}
                                </a>
                            </div>
                        
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection