<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use App\Models\Groups;
use App\Models\MainPage;
use App\Models\MethodicalWorks;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $data = MainPage::all();
        if(isset($data[0])){
            $data = $data[0];
            $groups = static::getGroups($data->groups_ids);
            $photos = static::getPhotos($data->photo_gallery_paths);
            $certificates = static::getCertificates($data->certificates_ids);  
            return view("pages.index", compact('groups','photos','certificates'));
        }
        return view("pages.index");
    }

    protected static function getGroups(array $ids){
        $data = [];
        for($i = 0; $i < count($ids); $i ++){
            if($i < 4){
                $elem = Groups::find($ids[$i]);
                $data[] = [
                    "title"    =>  $elem->title,
                    "path_url" =>  $elem->path_url,
                    "id"       =>  $elem->id
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
