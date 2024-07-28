@extends("layouts.app")

@section("title", "Квалификации")

@section("app")

<div class="container py-5">
    <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast">
        <a href="{{route("portfolio_page")}}">
            Квалификации
        </a>
    </h2>

    <p class="w-full h-[3px] bg-contrast mt-6"></span>

    <div class="my-10 flex flex-col gap-5">
        @foreach($data as $key => $qualifications)
            <div class="shadow-circle rounded-[10px] p-5">
                <h3 class="font-bold text-[20px] sm:text-[30px] lg:text-[30px] color-contrast">{{ $key }}</h3>
                <p class="w-full h-[3px] bg-contrast mt-6"></span>

                <div class="mt-5 flex flex-col gap-5">
                    @foreach(array_reverse($qualifications) as $elem)
                        <div class="shadow-circle rounded-[10px] p-3 font-medium text-[14px] sm:text-[17px] lg:text-[20px] color-contrast sm:flex justify-between">
                            <div class="w-full sm:w-[90%] flex flex-col gap-1">
                                <div class="flex ">
                                    <p>{{ $elem["order"] }}.</p>
                                    <p>
                                        @if($elem["type"] == 1)
                                            Удостоверение о повышении квалификации
                                        @else 
                                        Сертификат об окончании курса от {{ $elem["hours_date"] ? $elem["hours_date"] : "" }}
                                        @endif
                                    </p>
                                </div>
                                <p>№ {{ $elem["number_document"] }}</p>
                                <p>{{ $elem["title"] }}</p>
                                @if($elem["type"] == 1)
                                    <p>{{ $elem["hours_date"] }}</p>
                                @endif
                            </div>
                            <div class="w-full mt-5 sm:mt-0 sm:w-[10%] text-right sm:text-center">
                                <a href="{{ route("qualifications_download", $elem["id"]) }}" class="border-[1px] border-[#4D86F7] sm:border-0 rounded-[5px] px-[40px] sm:px-0">Скачать</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection