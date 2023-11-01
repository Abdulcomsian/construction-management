<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{TemporaryWorkComment};
use Illuminate\Support\Facades\Storage;

class SetTWCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = TemporaryWorkComment::get();
        $directory = 'uploads/commentsfile';
        foreach($comments as $key =>  $comment){
            if(isset($comment->replay)  && !is_null($comment->replay)){

                $replyImages = $comment->reply_image;
                
                foreach($comment->replay as $index => $reply){

                    if(!is_null($replyImages[$index])){
                        
                        $imageUrl = explode("/" , $replyImages[$index]);

                        $imageName = $imageUrl[sizeof($imageUrl)-1];

                        $newName = ($index+1)."-".$imageName;
                        
                        if(file_exists(public_path($replyImages[$index]))){

                            $oldPath = public_path($replyImages[$index]);
                            $newPath = public_path("$directory/$newName");
                            
                            rename($oldPath , $newPath);
                        }

                        
                        $replyImages[$index] = "$directory/$newName"; 
                        
                    }
                    
                }
                
                $comment->reply_image = $replyImages;
                
                $comment->save();
                
                
            }
        }


    }
}
