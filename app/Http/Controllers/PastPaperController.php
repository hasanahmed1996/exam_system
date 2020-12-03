<?php

namespace App\Http\Controllers;

use App\Paper;
use App\Degree;
use Illuminate\Http\Request;

class PastPaperController extends Controller
{
    ///this is like the index function in the index controller
    public function papers(){
        $papersAll = Paper::get();

        //get all degrees along with there fields of study
        //e.g - computer science(degree) and computer animation(field of study)

        $degrees = Degree::with('degrees')->where(['parent_id'=>0])->get();
        //$degrees = json_decode(json_encode($degrees));
        //echo "<pre>"; print_r($degrees); die;

        return view('past_papers')->with(compact('papersAll', 'degrees'));
    }
}
