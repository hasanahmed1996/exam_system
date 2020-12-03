<?php

namespace App\Http\Controllers;

use App\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    //
    public function addDegree(Request $request){
        if ($request -> isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $degree = new Degree;
            $degree->name = $data['degree_name'];
            $degree->parent_id = $data['parent_id'];
            $degree->description = $data['description'];
            $degree->url = $data['url'];
            $degree->save();
            return redirect('admin/view-degrees')->with('flash_message_success', 'Degree/module added successfully!');

        }

        $modules = Degree::where(['parent_id'=> 0])->get();
        return view('admin.degrees.add_degree')->with(compact('modules'));
    }

    public function viewDegrees(){
        $degrees = Degree::get();
        return view('admin.degrees.view_degrees')->with(compact('degrees'));
    }

    public function editDegree(Request $request, $id = null){
         if ($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            Degree::where(['id'=>$id])->update(['name'=>$data['degree_name'], 'description'=>$data['description'], 'url'=>$data['url']]);
                return redirect('/admin/view-degrees')->with('flash_message_success', 'Degree updated successfully');
            }
        $degreeDetails = Degree::where(['id'=>$id])->first();
        $modules = Degree::where(['parent_id'=> 0])->get();
        return view('admin.degrees.edit_degree')->with(compact('degreeDetails','modules'));
        //get degree details from degree id to be edited and will return to edit degree form where admin makes changes.




    }

    public function deleteDegree($id = null){
        if (!empty($id)){
            Degree::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_message_success', 'Degree type deleted successfully');
        }
    }
}
