<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class Uploader extends Base
{
    public function upload(Request $request)
    {
        $folder = DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
        $path = '..' . DIRECTORY_SEPARATOR . 'schijf-api';
        $image = Input::file('image');

        if ($image) {
            $fileName = uniqid('upload_') . '_' . strtolower($image->getClientOriginalName());
            $fullPath = $path . $folder . $fileName;

            Image::make($image->getRealPath())->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($fullPath);

            return response()->json([
                'url' => $folder . $fileName
            ], 201);
        }
    }
}
