<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Files;

class UploadFile extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile("files"))
        {
            $status = 1;
            $files = $request->files;

            foreach($files as $file)
            {
                if($file->getSize() > 500000)
                {
                    $status = 0;
                    echo $file->getSize();
                }

                if($file->getMimeType() != "image/jpeg" && $file->getMimeType() != "image/gif" && $file->getMimeType() != "image/png"  )
                {
                    $status = 0;
                }

                if( preg_match("/\s/",$file->getClientOriginalName() ))
                {
                    $status = 0;
                }

                $target_directory = public_path()."/Repos/".$file->getClientOriginalName();
                if(file_exists($target_directory))
                {
                    $status = 0;
                }

            }

            if($status == 1)
            {
                foreach($files as $file)
                {
                    $location = $file->getClientOriginalName();
                    $toPublic = public_path();
                    $destinationPath = $toPublic."\Repos";

                    $name = $file->getClientOriginalName();
                    $type = $file->getMimeType();
                    $upload_success = $file->move($destinationPath, $location);


                    $storeFile = new Files;
                    $storeFile->name = $name;
                    $storeFile->type = $type;
                    $storeFile->save();

                    $storeFile = null;



                }
                return redirect("/");
            }
            else
            {
                echo "Problem while Uploading the files!Please check:<ul><li>The size of files</li><li>Types of files uploaded</li><li>If filenames contain any spaces</li><li>File(s) already exist!</li><ul><br><a href='/'>Go back!</a>";
            }
        }
        else
        {
            echo "Please select files to upload!<a href='/'>Go back!</a>";
        }

    }
}
