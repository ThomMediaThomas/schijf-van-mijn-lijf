<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class Programs extends Base
{
    protected $dataKey = 'program';
    protected $modelClass = 'Program';

    public function index(Request $request)
    {
        $this->validateAuthentication($request);
        $collection = Program::where('user_id', $this->user->id);
        return response()->json($collection->get(), 201);
    }

    public function create(Request $request)
    {
        $this->validateAuthentication($request);

        $data = $request->get($this->dataKey);
        $data = array_merge($data, [
            'user_id' => $this->user->id
        ]);

        $entry = Program::create($data);

        return response()->json($entry, 201);
    }
}
