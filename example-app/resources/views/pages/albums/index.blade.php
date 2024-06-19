@extends("layouts.app")

@section("title", "Альбомы")

@section("app")

<div class="container py-10">
    <h2 class="font-extra text-[20px] sm:text-[30px] lg:text-[40px] color-contrast">
        <a href="{{ route("albums_page")}}">
            Фотогалерея
        </a>
    </h2>

    <p class="w-full h-[3px] bg-contrast mt-6"></span>

    <div class="mt-10">
        @if(count($albums))
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($albums as $album)
                    <a href="{{ route("album_photos_page", $album->id) }}" class="relative h-[310px]">
                        <div class="absolute bottom-0 left-0 shadow-circle rounded-[10px] w-[90%] h-[290px] bg-white z-30">
                            <img src="{{ asset("storage/$album->path_url")}}" alt="" class="border-2 h-[60%] sm:h-[80%] rounded-t-[10px] object-cover">
                            <div class="font-semi text-[16px] p-3 sm:pl-5 h-[40%] sm:h-[20%] flex items-center color-contrast">
                                <p class="">{{ $album->title }}</p>
                            </div>
                        </div>
                        <div class="absolute top-[50%] left-[50%] shadow-circle rounded-[10px] translate-x-[-50%] translate-y-[-50%]  w-[90%] h-[290px] bg-white z-20"></div>
                        <div class="absolute top-0 right-0 shadow-circle rounded-[10px] w-[90%] h-[290px] bg-white z-10"></div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="flex flex-col gap-5">
                <p class="font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-6 shadow-circle rounded-[10px] flex justify-center items-center text-center">В данный момент альбомы не загружены</h1>
                <div class="flex justify-end">
                    <a href="{{ route("main_page")}}" class="w-[200px] font-medium text-[14px] sm:text-[20px] color-contrast px-3 py-4 shadow-circle rounded-[10px] flex justify-center items-center text-center">Назад</a>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection
