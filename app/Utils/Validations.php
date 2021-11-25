<?php


namespace App\Utils;


use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class Validations
{
    public static function storeProject($request){
       $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'no' => ['required',  'amount' => "regex:/^\d+(\.\d{1,2})?$/",'gt:0', 'digits_between:1,6'],
       ]);
    }

    public static function updateProjectId($request){
       $request->validate([
           'id' => ['required', 'exists:projects,id'],
       ]);
    }

    public static function storeCompany($request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'projects.*' => ['required', 'exists:projects,id'],
        ],[
            'projects.*' => 'The project field is required.',
        ]);
    }

    public static function updateCompanyId($request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'projects.*' => ['required', 'exists:projects,id'],
        ],[
            'projects.*' => 'The project field is required.',
        ]);
    }
}
