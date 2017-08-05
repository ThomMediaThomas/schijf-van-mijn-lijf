<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Uploader extends Base
{
    private $path = 'C:\dev\schijf-van-mijn-lijf\app\frontend';
    private $folder = '\files\uploads\\';

    public function upload(Request $request)
    {
        $image = Input::file('image');

        if ($image) {
            $fileName = uniqid('upload_') . '_' . strtolower($image->getClientOriginalName());

            $image->move($this->path . $this->folder, $fileName);

            return response()->json([
                'url' => $this->folder . $fileName
            ], 201);
        }
    }
}
