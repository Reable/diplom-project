<?php

namespace App\Http\Controllers;

use App\Models\Albums;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function albums_page(){
        $albums = Albums::where("show", 1)->get();
        return view("pages.albums.index", compact("albums"));
    }

    public function album_photos_page($album_id){
        $album = Albums::find($album_id);
        if(!$album){
            return $this->albums_page();
        }
        $photos = PhotoGallery::where("album_id", $album->id)->get();
        
        return view("pages.albums.photos", compact("album", "photos"));
    }
}
