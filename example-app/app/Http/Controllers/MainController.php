<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use App\Models\MainPage;
use App\Models\MethodicalWorks;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $data = MainPage::all();
        if(isset($data[0])){
            $data = $data[0];
            $works = static::getMethodical($data->methodical_works_ids);
            $photos = static::getPhotos($data->photo_gallery_paths);
            $certificates = static::getCertificates($data->certificates_ids);  
            return view("pages.index", compact('works','photos','certificates'));
        }
        // dump($works);
        // dump($photos);
        // dump($certificates);

        return view("pages.index");
    }

    protected static function getMethodical(array $ids){
        $data = [];
        for($i = 0; $i < count($ids); $i ++){
            if($i < 4){
                $elem = MethodicalWorks::find($ids[$i]);
                $data[] = [
                    "title"  =>  $elem->title,
                    "id"     =>  $elem->id
                ];
            }
        }
        return $data;
    }

    protected static function getPhotos(array $paths){
        $data = [];
        for($i = 0; $i < count($paths); $i ++){
            if($i < 6){
               $data[] = $paths[$i];
            }
        }
        return $data;
    }

    protected static function getCertificates(array  $ids){
        $data = [];
        for($i = 0; $i < count($ids); $i ++){
            if($i < 4){
                $elem = Certificates::find($ids[$i]);
                $data[] = [
                    "title"        => $elem->title,
                    "path_url"     => $elem->path_url
                ];
            }
        }
        return $data;
    }
}
