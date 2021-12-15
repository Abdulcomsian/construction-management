<?php


namespace App\Utils;


use Illuminate\Support\Facades\File;

class HelperFunctions
{
    public static function saveFile($oldFile = null, $newFile, $filePath)
    {
        try {
            $public_path = public_path($filePath);
            File::isDirectory($public_path) or File::makeDirectory($public_path, 0777, true, true);
            if ($oldFile) {
                @unlink($oldFile);
            }
            $filename = time() . '.' . $newFile->getClientOriginalExtension();
            $newFile->move($public_path, $filename);
            return $filePath . $filename;
        } catch (\Exception $exception) {
            return null;
        }
    }

    public static function profileImagePath($user = null)
    {
        if ($user) {
            $path = 'uploads/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/profile_images/';
        } else {
            $path  = 'uploads/others/profile_images/';
        }
        return $path;
    }

    //tempory work uploaded image path
    public static function temporaryworkImagePath($user = null)
    {
        if ($user) {
            $path = 'uploads/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/profile_images/';
        } else {
            $path  = 'temporarywork/images/';
        }
        return $path;
    }
    public static function  temporaryworkuploadPath($user = null)
    {
        if ($user) {
            $path = 'uploads/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/profile_images/';
        } else {
            $path  = 'temporarywork/images/drawings/';
        }
        return $path;
    }

    public function check_date($desingdate, $array)
    {
        if (!isset($array[0])) {
            $current =  \Carbon\Carbon::now();
            $to = \Carbon\Carbon::createFromFormat('Y-m-d', $desingdate);
            $diff_in_days = $to->diffInDays($current);
            $result =  $current->gt($to);
            if ($result) {
                $class = "background:red;color:black";
            } elseif ($diff_in_days >= 7) {
                $class = "background:green;color:black";
            } elseif ($diff_in_days <= 7 && $diff_in_days >= 1) {
                $class = "background:yellow;color:black";
            }
            return $class;
        } else {
            foreach ($array as $arr) {
                if ($arr->file_type == 1) {
                    $current = $arr->created_at;
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $desingdate);
                    $diff_in_days = $to->diffInDays($current);
                    $result =  $current->gt($to);
                    if ($result) {
                        $class = "color:red";
                    } elseif ($diff_in_days >= '7') {
                        $class = "color:green";
                    } elseif ($diff_in_days <= 7 && $diff_in_days >= 0) {
                        $class = "color:yellow";
                    }
                    return $class;
                    break;
                } else {
                    $current =  \Carbon\Carbon::now();
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d', $desingdate);
                    $diff_in_days = $to->diffInDays($current);
                    $result =  $current->gt($to);
                    if ($result) {
                        $class = "background:red";
                    } elseif ($diff_in_days >= 7) {
                        $class = "background:green";
                    } elseif ($diff_in_days <= 7 && $diff_in_days >= 1) {
                        $class = "background:yellow";
                    }
                }
            }
            return $class;
        }
    }
}
