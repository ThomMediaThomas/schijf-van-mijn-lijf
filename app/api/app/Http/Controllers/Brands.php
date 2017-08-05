<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class Brands extends Base
{
    protected $dataKey = 'brand';
    protected $modelClass = 'Brand';

    public function search(Request $request)
    {
        $this->validateAuthentication($request);

        if ($request->name) {
            $collection = Brand::where('name', 'LIKE', '%' . $request->name . '%')->get();
        }

        return response()->json($collection, 201);
    }
}
