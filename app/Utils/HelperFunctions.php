<?php


namespace App\Utils;


use Illuminate\Support\Facades\File;
use App\Models\TemporaryWork;
use App\Models\Tempworkshare;
use App\Models\User;
use App\Notifications\TempworkshareNotify;
use Notification;

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
            $filename = time() . rand(10000, 99999) . '.' . $newFile->getClientOriginalExtension();
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

    public static function scaffoldImagePath($user = null)
    {
        if ($user) {
            $path = 'uploads/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/profile_images/';
        } else {
            $path  = 'uploads/scaffold_images/';
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
    public static function Projectdocupath($user = null)
    {
        if ($user) {
            $path = 'uploads/proj-doc/' . strtolower(str_replace(' ', '_', trim($user->name))) . '-id-' . $user->id . '/profile_images/';
        } else {
            $path  = 'uploads/proj-doc/';
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
                        $class = "background:#f2f2f2;color:red";
                    } elseif ($diff_in_days >= '7') {
                        $class = "background:#f2f2f2;color:green";
                    } elseif ($diff_in_days <= 7 && $diff_in_days >= 0) {
                        $class = "background:#f2f2f2;color:orange";
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

    public static function generatetwcid($projecno, $company, $project_id)
    {
        $count = TemporaryWork::where('project_id', $project_id)->count();
        $count = $count + 1;
        $twc_id_no = $projecno . '-' . strtoupper(substr($company, 0, 2)) . '-00' . $count;
        return $twc_id_no;
    }
    public static function generatetempid($project_id)
    {
        $check = TemporaryWork::where('project_id', $project_id)->orderBy('id', 'desc')->first();
        if ($check) {
            $j = $check->tempid + 1;
        } else {
            $j = 1;
        }
        return $j;
    }

    public static function savesignature($request)
    {
        $image_name = '';
        if ($request->signtype == 1) {
            $image_name = $request->namesign;
        } else {
            $folderPath = public_path('temporary/signature/');
            $image = explode(";base64,", $request->signed);
            $image_type = explode("image/", $image[0]);
            $image_type_png = $image_type[1];
            $image_base64 = base64_decode($image[1]);
            $image_name = uniqid() . '.' . $image_type_png;
            $file = $folderPath . $image_name;
            file_put_contents($file, $image_base64);
        }
        return $image_name;
    }

    public static function getProjectid($tempid)
    {
        $project = TemporaryWork::select('project_id')->find($tempid);
        return $project->project_id;
    }

    public static function sharetemwork($useremail, $condition, $tempid, $projectid, $commentsandother)
    {
        //check use exist or not
        $Userdata = User::where(['email' => $useremail])->first();
        if ($Userdata) {
            if ($condition == "all") {
                $tempworkidds = TemporaryWork::select('id')->where(['project_id' => $projectid])->get();

                for ($i = 0; $i < count($tempworkidds); $i++) {
                    //check if already exist
                    $check = Tempworkshare::where(['temporary_work_id' => $tempworkidds[$i]->id, 'user_id' => $Userdata->id])->count();
                    if ($check <= 0) {
                        $model = new Tempworkshare();
                        $model->temporary_work_id = $tempworkidds[$i]->id;
                        $model->user_id = $Userdata->id;
                        $model->save();
                    }
                }
                Notification::route('mail', $Userdata->email)->notify(new TempworkshareNotify($tempworkidds, $commentsandother));
            } else {
                $check = Tempworkshare::where(['temporary_work_id' => $tempid, 'user_id' => $Userdata->id])->count();
                if ($check <= 0) {
                    $model = new Tempworkshare();
                    $model->temporary_work_id = $tempid;
                    $model->user_id = $Userdata->id;
                    $model->save();
                }
                Notification::route('mail', $Userdata->email)->notify(new TempworkshareNotify($tempid, $commentsandother));
            }
        } else {
            //send email to user
            if ($condition == "all") {
                $tempworkidds = TemporaryWork::select('id')->where(['project_id' => $projectid])->get();
                //send email to user and send all tempwork ids u have shared
                Notification::route('mail', $useremail)->notify(new TempworkshareNotify($tempworkidds, $commentsandother));
            } else {
                //send email to suer current tempwork
                Notification::route('mail', $useremail)->notify(new TempworkshareNotify($tempid, $commentsandother));
            }
        }
    }
}
