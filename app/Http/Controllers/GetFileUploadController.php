<?php

namespace App\Http\Controllers;


class GetFileUploadController extends Controller
{
    public function getFileUpload($folder_type, $title_blasses_id, $file_name)
    {
        $path_file = storage_path('app/public/upload_images/'.$folder_type.'/'.$title_blasses_id.'/'.$file_name);
        return response()->file($path_file);;
    }
}
