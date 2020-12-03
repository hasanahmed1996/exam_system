<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Auth;
use Session;
use Image;
use App\Degree;
use App\Paper;



class PapersController extends Controller
{
    public function addPaper(Request $request){//upload

        if ($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if (empty($data['degree_id'])){
                return redirect()->back()->with('flash_message_error', 'Under Degree - MISSING');
            }
            $paper = new Paper();
            $paper-> degree_id = $data['degree_id'];
            $paper-> paper_name = $data['paper_name'];
            $paper-> paper_code = $data['paper_code'];
            $paper-> paper_year = $data['paper_year'];
            if (!empty($data['description'])){
                $paper-> description = $data['description'];
            }else{
                $paper-> description = '';
            }

            //upload thumbnail image
            if ($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $all_images = 'images/backend_images/thumbnails'.'/'.$fileName;

                    Image::make($image_tmp)->resize(250, 250)->save($all_images);
                    $paper->image = $fileName;
                }
            }

            //upload file
            if ($request->hasFile('file')){
                 $file_tmp = Input::file('file');
                 $file_name = $file_tmp->getClientOriginalName();
                 $file_path = 'files/';
                 $file_tmp->move($file_path,$file_name);
                 $paper->file = $file_name;
            }


            $paper->save();
            //return redirect()->back()->with('flash_message_success', 'Past paper has been added successfully');
            return redirect('/admin/view-papers')->with('flash_message_success', 'Past paper has been added successfully');
        }

        //degree drop down start
        $degrees = Degree::where(['parent_id'=>0])->get();
        $degrees_dropdown = "<option selected disabled>Select associated degree</option>";
        foreach($degrees as $deg){
            $degrees_dropdown .="<option value='".$deg->id."'>".$deg->name."</option>";
            $modules = Degree::where(['parent_id'=>$deg->id])->get();
            foreach ($modules as $deg_module){
                $degrees_dropdown .= "<option value = '".$deg_module->id."'>&nbsp;>>>&nbsp;".$deg_module->name."</option>";
            }//Displaying all categories with their associated modules.
            //(the id and names are being displayed, that we will pass
            // and store as degree_id in the papers table)
        }
        //degree drop down end

        return view('admin.papers.add_paper')->with(compact('degrees_dropdown'));
    }

    public function viewPapers(){
        $papers = Paper::get();
        foreach ($papers as $key => $val){
            $degree_name = Degree::where(['id'=>$val-> degree_id])->first();
            $papers[$key]->degree_name = $degree_name-> name;
        }
        //echo "<pre>"; print_r($papers); die;
        return view('admin.papers.view_papers')->with(compact('papers'));
    }

    public function editPaper(Request $request, $id = null){

        if ($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;


            //upload thumbnail image
            if ($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $all_images = 'images/backend_images/thumbnails'.'/'.$fileName;
                    //resize image
                    Image::make($image_tmp)->resize(100, 100)->save($all_images);
                }
            }else if (!empty($data['current_image'])){
                $fileName = $data['current_image'];
            }else{
                $fileName = '';
            }

            //upload file
            if ($request->hasFile('file')){
                $file_tmp = Input::file('file');
                $file_name = $file_tmp->getClientOriginalName();
                $file_path = 'files/';
                $file_tmp->move($file_path,$file_name);
                $docName = $file_name;
            }else if (!empty($data['current_file'])){
                $docName = $data['current_file'];
            }else{
                $docName = '';
            }

            if(empty($data['description'])){
                $data['description'] = '';
            }


            Paper::where(['id'=>$id])->update(['degree_id'=>$data['degree_id'],
                'paper_name'=>$data['paper_name'],'paper_code'=>$data['paper_code'],
                'paper_year'=>$data['paper_year'],'description'=>$data['description'], 'image'=>$fileName, 'file'=>$docName]);

            return redirect()->back()->with('flash_message_success', 'Paper details updated successfully');
        }



        $paperDetails = Paper::where(['id'=>$id])->first();
        //degree drop down start
        $degrees = Degree::where(['parent_id'=>0])->get();
        $degrees_dropdown = "<option selected disabled>Select associated degree</option>";
        foreach($degrees as $deg){
            if ($deg->id==$paperDetails->degree_id){
                $selected = "selected";
            }else{
                $selected ="";
            }
            $degrees_dropdown .="<option value='".$deg->id."' ".$selected.">".$deg->name."</option>";
            $modules = Degree::where(['parent_id'=>$deg->id])->get();
            foreach ($modules as $deg_module){
                if ($deg_module->id==$paperDetails->degree_id){
                    $selected = "selected";
                }else{
                    $selected ="";
                }
                $degrees_dropdown .= "<option value = '".$deg_module->id."' ".$selected.">&nbsp;>>>&nbsp;".$deg_module->name."</option>";
            }//Displaying all categories with their associated modules.
            //(the id and names are being displayed, that we will pass
            // and store as degree_id in the papers table)
        }
        //degree drop down end
        return view('admin.papers.edit_paper')->with(compact('paperDetails', 'degrees_dropdown'));
    }

    public function deletePaperThumb($id=null){
        Paper::where(['id'=>$id])->update(['image'=>'']);
        return redirect()->back()->with('flash_message_success', 'Thumbnail has been deleted successfully');
    }

    public function deletePaperFile($id=null){
        Paper::where(['id'=>$id])->update(['file'=>'']);
        return redirect()->back()->with('flash_message_success', 'File has been deleted successfully');
    }

    public function deletePaper($id = null){
        Paper::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success', 'Past paper has been deleted successfully');

    }

    public function papers($url = null){
        $degrees = Degree::with('degrees')->where(['parent_id'=>0])->get();
        $degreeDetails = Degree::where(['url' => $url])->first();
        $papersAll = Paper::where(['degree_id'=> $degreeDetails-> id])->get();
        return view('papers.orderedListing')->with(compact('degrees','degreeDetails', 'papersAll'));
    }

    public function paperDetails($id = null){
        //get the paper details of a specific id
        $paperDetails = Paper::where('id', $id)->first();

        $degrees = Degree::with('degrees')->where(['parent_id'=>0])->get();


        return view('papers.detail')->with(compact('paperDetails', 'degrees'));
    }
}
