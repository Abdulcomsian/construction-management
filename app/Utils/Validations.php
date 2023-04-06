<?php


namespace App\Utils;


use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class Validations
{
    public static function storeProject($request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'no' => ['required',  'amount' => "regex:/^\d+(\.\d{1,2})?$/", 'gt:0', 'digits_between:1,9'],
        ]);
    }

    //store comment
    public static function storeComment($request)
    {
        $request->validate([
            'comment' => ['required', 'string'],
        ]);
    }

    public static function updateProjectId($request)
    {
        $request->validate([
            'id' => ['required', 'exists:projects,id'],
        ]);
    }

    public static function storeCompany($request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'projects' => ['required', 'array', 'min:1',],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'projects' => 'The project name field is required.',
        ]);
    }

    public static function updateCompany($request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'projects' => ['required', 'array', 'min:1',],
        ], [
            'projects' => 'The project name field is required.',
        ]);
    }

    public static function storeUser($request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_id' => ['required', 'min:1',],
            'projects' => ['required', 'array', 'min:1',],

        ], [
            'projects.*' => 'The project name field is required.',
            'company_id.*' => 'The company name field is required.',
        ]);
    }

    public static function storeDesigner($request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public static function storeAdminDesigner($request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'designer_company' => ['required', 'string', 'max:255'],
        ]);
    }

    public static function assignProject($request)
    {
        $request->validate([
            'user_id' => ['required', 'min:1',],
            'projects' => ['required', 'array', 'min:1',],

        ], [
            'projects.*' => 'The project name field is required.',
            'user_id.*' => 'The user name field is required.',
        ]);

    }

    public static function updateUser($request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'company_id' => ['required', 'min:1',],
            // 'projects' => ['required', 'array', 'min:1',],
        ], [
            // 'projects.*' => 'The project name field is required.',
            'company_id.*' => 'The company name field is required.',
        ]);
    }

    public static function updateDesigner($request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
        ]);
    }

    public static function updateAdminDesigner($request,$id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
        ]);
    }

    public static function updateUserPassword($request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public static function storeTemporaryWork($request)
    {
        $request->validate([
            // 'photo' => ['required'],
            'project_id' => ['required', 'max:255', 'exists:projects,id'],
            'design_required_by_date' => ['required'],
            'designer_company_name' => ['required'],
            'designer_company_email' => ['required'],
            'twc_name' => ['required'],
            'twc_email' => ['required'],
            'tw_category' => ['required'],
            'tw_risk_class' => ['required'],
            'design_requirement_text' => ['required'],
            'description_temporary_work_required' => ['required'],
            'name' => ['required'],
            'job_title' => ['required'],
            'company' => ['required'],
            'signed' => 'required_if:signtype,2',
            'namesign' => 'required_if:signtype,1',
            'pdfphoto'=>'required_if:pdfsigntype,1',
        ]);
    }

    public static function storeEstimatorWork($request)
    {
        $request->validate([
            'project_id' => ['required', 'max:255', 'exists:projects,id'],
        ]);
    }

    public static function storeManuallyTemporaryWork($request)
    {
        $request->validate([
        'project_id' => ['required', 'max:255', 'exists:projects,id'],
        'design_required_by_date' => ['required'],
        'tw_category' => ['required'],
        'tw_risk_class' => ['required'],
        'design_requirement_text' => ['required'],
        'description_temporary_work_required' => ['required'],
        'pdf'=>['required'],
        // 'dcc_returned'=>['required'],
        // 'dcc'=>['required'],
        // 'drawing'=>['required'],
        // 'design_returned'=>['required'],
        ]);

    }

    public static function storepermitload($request)
    {
        $request->validate([
            'project_id' => ['required', 'max:255', 'exists:projects,id'],
            'twc_name' => ['required'],
            'drawing_no' => ['required'],
            'permit_no' => ['required'],
            'drawing_title' => ['required'],
            'tws_name' => ['required'],
            // 'ms_ra_no' => ['required'],
            'name1' => 'required_if:principle_contractor,1',
            'job_title1' => 'required_if:principle_contractor,1',
            'name' => ['required'],
            'job_title' => ['required'],
            'company' => ['required'],
            'signed' => 'required_if:signtype,0',
            'images' => 'max:50000',
        ],[
            'images.*'=>'Image size is greater than 50 Mb',
        ]);
    }

    public static function storepermitunload($request)
    {
        $request->validate([
            'project_id' => ['required', 'max:255', 'exists:projects,id'],
            'twc_name' => ['required'],
            'drawing_no' => ['required'],
            'permit_no' => ['required'],
            'drawing_title' => ['required'],
            'tws_name' => ['required'],
            // 'ms_ra_no' => ['required'],
            'name1' => 'required_if:principle_contractor,1',
            'job_title1' => 'required_if:principle_contractor,1',
            'name' => ['required'],
            'job_title' => ['required'],
            'company' => ['required'],
            'signed' => 'required_if:signtype,0',
        ]);
    }

    //validation scafffolding
    public static function storescaffolding($request)
    {
        $request->validate([
            'project_id' => ['required', 'max:255', 'exists:projects,id'],
            'twc_name' => ['required'],
            'drawing_no' => ['required'],
            'permit_no' => ['required'],
            'drawing_title' => ['required'],
            'tws_name' => ['required'],
            // 'ms_ra_no' => ['required'],
            'equipment_materials_desc' => 'required_if:equipment_materials,2',
            'workmanship_desc' => 'required_if:workmanship,2',
            'drawings_design_desc' => 'required_if:drawings_design,2',
            'loading_limit_desc' => 'required_if:loading_limit,2',

            // 'even_stable_comment' => 'required_if:even_stable_radio,2',
            // 'base_Plates_comment' => 'required_if:base_Plates_radio,2',
            // 'sole_boards_comment' => 'required_if:sole_boards_radio,2',
            // 'undermined_radio_comment' => 'required_if:undermined_radio_radio,2',
            // // 'Plumb_comment' => 'required_if:Plumb_radio,2',
            // 'staggered_joints_comment' => 'required_if:staggered_joints_radio,2',
            // 'wrong_spacing_comment' => 'required_if:wrong_spacing_radio,2',
            // 'damaged_comment' => 'required_if:damaged_radio,2',
            // 'trap_boards_comment' => 'required_if:trap_boards_radio,2',
            // 'incomplete_boarding_comment' => 'required_if:incomplete_boarding_radio,2',
            // 'supports_ties_comment' => 'required_if:supports_ties_radio,2',
            // 'insufficient_length_comment' => 'required_if:insufficient_length_radio,2',
            // 'missing_loose_comment' => 'required_if:missing_loose_radio,2',
            // 'wrong_fittings_comment' => 'required_if:wrong_fittings_radio,2',
            // 'not_level_comment' => 'required_if:not_level_radio,2',
            // 'joined_same_bays_comment' => 'required_if:joined_same_bays_radio,2',
            // 'loose_damaged_comment' => 'required_if:loose_damaged_radio,2',
            // 'wrong_height_comment' => 'required_if:wrong_height_radio,2',
            // 'some_missing_comment' => 'required_if:some_missing_radio,2',
            // 'partially_removed_comment' => 'required_if:partially_removed_radio,2',
            // 'loose_damaged_broken_comment' => 'required_if:loose_damaged_broken_radio,2',
            // 'other_comment' => 'required_if:other_radio,1',

            'inspected_by' => 'required',
            'job_title' => 'required',
            'company' => 'required',

        ]);
    }
}
