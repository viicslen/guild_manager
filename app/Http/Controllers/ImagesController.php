<?php

namespace App\Http\Controllers;

class ImagesController extends Controller
{
    public function getFile($folder, $filename)
    {
        return response()->download(storage_path("app/$folder/$filename"), null, [], null);
    }
}
