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
            'sign' => 'required_if:signtype,0',
            'namesign' => 'required_if:signtype,1',
        ]);
    }
}
