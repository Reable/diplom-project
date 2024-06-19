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
            </a> |
            <a href="{{ route("groups_materials_select_page", [$group["id"], $session["id"]] )}}">
                Практические работы
            </a>
        </h3>
        <p class="w-full h-[3px] bg-contrast mt-6"></span>

        <div class="mt-10">
            @if(isset($materials[0]))
                <div class="mt-10 flex flex-col gap-8">
                    @foreach($materials as $material)
                        <a href="{{ route("groups_practical_materials_download", [$group["id"], $session["id"], $material["id"]]) }}"
                           class="font-medium color-contrast shadow-circle rounded-[10px] flex justify-between items-center">
                           <span class="pl-5 text-[14px] sm:text-[18px]">
                                {{ $material["title"] }}
                           </span>
                           <span class="p-2 text-[14px] w-[10%] border-l-[3px] border-[rgb(224, 224, 224)] flex flex-col items-center gap-1">
                                <span>
                                    {{ $material["count_downloads"]  }}
                                </span>

                                <svg width="20" height="20" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="17" height="17" fill="url(#pattern0_121_562)"/>
                                    <defs>
                                    <pattern id="pattern0_121_562" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_121_562" transform="scale(0.01)"/>
                                    </pattern>
                                    <image id="image0_121_562" width="100" height="100" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAADFUlEQVR4nO2cwYoTQRRF24X4a47zXhaCooKgguKHpMu1S3/OzYiICoJiVRZqpJhWQibT093pqntJ3wMNM4tMn9xTCQyBNI0Qc/Pq3fZ2s93e0rIEeBsfWojfrI3fV2/iA7TP4rGQPnlI23xZSB8XPwga72L8u9A+i8cVhAtXEC5cQbhwBeHCFYQLVxAuXEG4cAXhwhWEC1cQLlxBuHAF4cIVhAtXEC5cQbhwBeHCFYQLVxAuXEG4cAXhwhWEC1cQLlxBuHAF4cIVhAtXEC5cQQ4PcexlIb639easdpDzsLmX7z3382lqM/cT6K4Px3qMfnybLko8l6Y2CpJOOwjqLcvWm7OTfMuqLtAhDw3BeTDgAh3y0BCcBwMu0CEPDcF5MOACHfLQEJwHAy7QIQ8NwXkw4AId8tAQnAcDLtAhDw3BeTDgAh3y0BCcB2MugfM2vbQQf1ibvq7a+Ki2h7XxSb53vrz9eX/s4+fyOJo5BO6+3d6xNsadTw1/r9bpRS2PfK98z/+Pb9OXqd/deBJB8pdX5u9K3P07NjLKVI8rMS6vz4sOkrEQn+4PYyOiTPE4FOPy9/h46vM4mSAZC+n5ldPaxj8W0uu5PY6515weszO3wNShfIRHqRhjPYpQQsAmDDbUo2SMMR7FKCVgI4cb4lE6xlCPopQUsBED3uRRI8YQj+KUFrCBQ/Z51Ipxk0cVagjYgEGv86gZo8+jGrUE7IZhD3nUjnGdR1VqCljPwPseiBiLC9L/3/V+kOn/9R/D4oJkDp7+vqvCK2PRQUZFqRhj0UEGRakco1l6kN4ogBgMe+AFmgNRQDEo9oALdPg6PbM2/spX/rkBAd8DLrBD/ix+yufxJ7UHXIAM+B5wATLge8AFyIDvARcgA74HXIAM+B5wATLge8AFyIDvARcgA74HXIAM+B5wATLge8AFyIDvARcgA74HXIAM+B5wATLge8AFyIDvARcgA74HXIAM+B5wATLge8AFyIDvARcgA74HXIAM+B5wATLge8AFyIDvsS+gKymIEx8EvUICPoKCBPzwcwf5C9XZg4WbQunzAAAAAElFTkSuQmCC"/>
                                    </defs>
                                </svg>

                           </span>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col gap-5">
                    <p class="font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-6 shadow-circle rounded-[10px] flex justify-center items-center text-center">В данный момент конспекты не загружены</h1>
                    <div class="flex justify-end">
                        <a href="{{ route("groups_page")}}" class="w-[200px] font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-4 shadow-circle rounded-[10px] flex justify-center items-center text-center">Назад</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection