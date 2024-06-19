@extends("layouts.app")

@section("title", "Фотогалерея")

@section("app")

<div class="container py-10">
    <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast">
        <a href="{{ route("albums_page")}}">
            Альбом
        </a>
    </h2>

    <h3 class="mt-0 font-extra text-[20px] sm:text-[30px] lg:text-[24px] color-contrast">
            <a href="{{ route("albums_page")}}">
                {{ $album["title"] }}
            </a> 
        </h3>

    <p class="w-full h-[3px] bg-contrast mt-6"></span>

    <div class="mt-10">
        @if(count($photos))
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($photos as $photo)
                    <div class="justify-center flex">
                        <img src="{{ asset("storage/".$photo->path_url) }}" class="sm:h-[200px] lg:h-[270px] object-cover rounded-[10px]">
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col gap-5">
                <p class="font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-6 shadow-circle rounded-[10px] flex justify-center items-center text-center">В данный момент фотографии не загружены</h1>
                <div class="flex justify-end">
                    <a href="{{ route("albums_page")}}" class="w-[200px] font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-4 shadow-circle rounded-[10px] flex justify-center items-center text-center">Назад</a>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection