<?php

namespace App\Http\Controllers;

use App\Paper;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        $papersAll = Paper::limit(4)->get();
        return view('index')->with(compact('papersAll'));

    }

}
