<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nomination;
use App\Models\NominationCourses;
use App\Models\NominationQualification;
use App\Models\NominationExperience;
use App\Models\NominationCompetence;
class HomeController extends Controller
{
    // nomination form
    public function nomination_form($id)
    {
       $userid= \Crypt::decrypt($id);
       return view('nomination',compact('userid'));
    }

    //save nomination form
    public function nomination_save(Request $request)
    {

      $nomination=Nomination::create($all_inputs);
      if($nomination)
      {
        //nomination courses
        for($i=0;$i<count($request->course);$i++)
        {
            $model=new NominationCourses();
            $model->course=$request->course[$i];
            $model->date=$request->date[$i];
            $model->nomination_id=$nomination->id;
            $model->save();
        }

        //nomination qualifications
        for($i=0;$i<count($request->qualifications);$i++)
        {
            $model=new NominationQualification();
            $model->qualification=$request->qualifications[$i];
            $model->date=$request->date[$i];
            $model->nomination_id=$nomination->id;
            $model->save();
        }

        //nomination experience
        for($i=0;$i<count($request->project_title);$i++)
        {
            $model=new NominationQualification();
            $model->project_title=$request->project_title[$i];
            $model->role=$request->role[$i];
            $model->description_involvment=$request->description_involvment;
            $model->nomination_id=$nomination->id;
            $model->save();
        }

        //nomination competence


      }
    }
}
