<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function getFile($folder, $filename)
    {
        return response()->download(storage_path("app/$folder/$filename"), null, [], null);
    }
}
