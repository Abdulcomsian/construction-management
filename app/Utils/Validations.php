<?php


namespace App\Utils;


use Illuminate\Support\Facades\File;

class Validations
{
   public static function storeProject($request){
       $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'status' => ['required', 'string'],
           'no' => ['required',  'amount' => "regex:/^\d+(\.\d{1,2})?$/",'gt:0', 'digits_between:1,6'],
       ]);
   }

   public static function updateProjectId($request){
       $request->validate([
           'id' => ['required'],
       ]);
   }
}
