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
            'signed1' => 'required_if:principle_contractor,1',
            'name' => ['required'],
            'job_title' => ['required'],
            'company' => ['required'],
            'signed' => ['required'],
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
            'equipment_materials_comment' => 'required_if:equipment_materials_radio,2',
            'workmanship_comment' => 'required_if:workmanship_radio,2',
            'drawings_design_comment' => 'required_if:drawings_design_radio,2',
            'loading_limit_comment' => 'required_if:loading_limit_radio,2',
        ]);
    }
}
