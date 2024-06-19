<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\PracticalMaterials;
use App\Models\TheoreticalMaterials;
use App\Models\TrainingSessions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GroupsController extends Controller
{
    public function groups_page(){
        $groups = Groups::all();
        $data = [];
        foreach ($groups as $group){
            $data[$group["form_education"]][] = $group;
        }
        return view('pages.groups.index', compact("data"));
    }

    public function groups_training_sessions_page($group_id){
        $group  = Groups::find($group_id);
        $sessions = TrainingSessions::where("group_id", $group_id)->get();

        if(!$group){
            return redirect('groups');
        }

        return view('pages.groups.training_sessions', compact("group", "sessions"));
    }

    public function groups_materials_select_page($group_id, $session_id){
        $group = Groups::find($group_id);
        $session = TrainingSessions::find($session_id);

        if(!$session){
            return redirect('groups/'.$group_id);
        }

        return view('pages.groups.materials_select', compact("group", "session"));
    }

    public function groups_theoretical_materials_page($group_id, $session_id){
        $group = Groups::find($group_id);
        $session = TrainingSessions::find($session_id);
        $materials = TheoreticalMaterials::where("training_session_id",  $session_id)->get();
        
        return view('pages.groups.theoretical_materials', compact("group", "session",  "materials"));
    }

    public function groups_practical_materials_page($group_id, $session_id){
        $group = Groups::find($group_id);
        $session = TrainingSessions::find($session_id);
        $materials = PracticalMaterials::where("training_session_id",  $session_id)->get();
        
        return view('pages.groups.practical_materials', compact("group", "session",  "materials"));
    }

    public function groups_theoretical_materials_download($group_id,  $session_id,  $material_id){
        $material = TheoreticalMaterials::find($material_id);
        $material->count_downloads = $material->count_downloads + 1;
        $material->save();
        $expansion = explode(".", $material["path_url"]);

        return response()->download(
            storage_path("app/public/".$material["path_url"]),
            $material["title"]. "." . 
            $expansion[count($expansion) - 1]);
    }

    public function groups_practical_materials_download($group_id,  $session_id,  $material_id){
        $material = PracticalMaterials::find($material_id);
        $material->count_downloads = $material->count_downloads + 1;
        $material->save();
        $expansion = explode(".", $material["path_url"]);

        return response()->download(
            storage_path("app/public/".$material["path_url"]),
            $material["title"]. "." . 
            $expansion[count($expansion) - 1]);
    }

}
