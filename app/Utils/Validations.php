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
            'no' => ['required',  'amount' => "regex:/^\d+(\.\d{1,2})?$/", 'gt:0', 'digits_between:1,6'],
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

    public static function updateUser($request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'company_id' => ['required', 'min:1',],
            'projects' => ['required', 'array', 'min:1',],
        ], [
            'projects.*' => 'The project name field is required.',
            'company_id.*' => 'The company name field is required.',
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
            'signed' => 'required_if:signtype,0',
            'namesign' => 'required_if:signtype,1',
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
            'ms_ra_no' => ['required'],
            'name1' => 'required_if:principle_contractor,1',
            'job_title1' => 'required_if:principle_contractor,1',
            'name' => ['required'],
            'job_title' => ['required'],
            'company' => ['required'],
            'signed' => 'required_if:signtype,0',
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
            'ms_ra_no' => ['required'],
            'name1' => 'required_if:principle_contractor,1',
            'job_title1' => 'required_if:principle_contractor,1',
            'signed1' => 'required_if:principle_contractor,1',
            'name' => ['required'],
            'job_title' => ['required'],
            'company' => ['required'],
            'signed' => ['required'],
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
            'ms_ra_no' => ['required'],

            'equipment_materials_comments' => 'required_if:equipment_materials,2',
            'workmanship_comments' => 'required_if:workmanship,2',
            'drawings_design_comments' => 'required_if:drawings_design,2',
            'loading_limit_comments' => 'required_if:loading_limit,2',

            'even_stable_comment' => 'required_if:even_stable_radio,2',
            'base_Plates_comment' => 'required_if:base_Plates_radio,2',
            'sole_boards_comment' => 'required_if:sole_boards_radio,2',
            'undermined_radio_comment' => 'required_if:undermined_radio_radio,1',
            'Plumb_radio_comment' => 'required_if:Plumb_radio,2',
            'staggered_joints_comment' => 'required_if:staggered_joints_radio,2',
            'wrong_spacing_comment' => 'required_if:wrong_spacing_radio,1',
            'damaged_comment' => 'required_if:damaged_radio,1',
            'trap_boards_comment' => 'required_if:trap_boards_radio,2',
            'incomplete_boarding_comment' => 'required_if:incomplete_boarding_radio,1',
            'supports_ties_comment' => 'required_if:supports_ties_radio,1',
            'insufficient_length_comment' => 'required_if:insufficient_length_radio,1',
            'missing_loose_comment' => 'required_if:missing_loose_radio,1',
            'wrong_fittings_comment' => 'required_if:wrong_fittings_radio,1',
            'not_level_comment' => 'required_if:not_level_radio,1',
            'joined_same_bays_comment' => 'required_if:joined_same_bays_radio,1',
            'loose_damaged_comment' => 'required_if:loose_damaged_radio,1',
            'wrong_height_comment' => 'required_if:wrong_height_radio,1',
            'some_missing_comment' => 'required_if:some_missing_radio,1',
            'partially_removed_comment' => 'required_if:partially_removed_radio,1',
            'loose_damaged_broken_comment' => 'required_if:loose_damaged_broken_radio,1',
            'other_comment' => 'required_if:other_radio,1',

            'inspected_by' => 'required',
            'job_title' => 'required',
            'company' => 'required',

        ]);
    }
}
