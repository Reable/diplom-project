<?php

namespace App\Http\Controllers;

use App\Models\Certificates;
use App\Models\ParticipationCompetitions;
use App\Models\Qualifications;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    public function portfolio_page(){
        return view('pages.portfolio.index');
    }

    public function competitions_page(){
        $competitions = ParticipationCompetitions::orderBy('year', "DESC")->get();
        $data = [];

        foreach($competitions as $competition){
            $data[$competition->year][] = [
                "id"=>$competition->id,
                "order"=>$competition->order,
                "year"=>$competition->year,
                "title"=>$competition->title,
                "competition"=>$competition->competition,
                "position"=>$competition->position,
                "place_title"=>$competition->place_title,
                "album_id"=>$competition->album_id,
            ];
        }
        return view('pages.portfolio.competitions', compact("data"));
    }

    public function qualifications_page(){
        $qualifications = Qualifications::orderBy('year', "DESC")->get();
        $data = [];

        foreach($qualifications as $qualification){
            $data[$qualification->year][] = [
                "id"=>$qualification->id,
                "order"=>$qualification->order,
                "year"=>$qualification->year,
                "type"=>$qualification->type,
                "number_document"=>$qualification->number_document,
                "title"=>$qualification->title,
                "hours_date"=>$qualification->hours_date,
                "path_url"=>$qualification->path_url,
            ];
        }
        return view('pages.portfolio.qualifications', compact("data"));
    }

    public function qualifications_download($id){
        $qualification  = Qualifications::find($id);
        return response()->download(storage_path("app/public/".$qualification->path_url));
    }

    public function certificates_page(){
        $certificates = Certificates::all();
        return view('pages.portfolio.certificates', compact("certificates"));
    }
}
