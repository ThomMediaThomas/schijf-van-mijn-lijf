<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class Entries extends Base
{
    protected $dataKey = 'entry';
    protected $modelClass = 'Entry';

    public function index(Request $request)
    {
        $this->validateAuthentication($request);
        $collection = Entry::where('user_id', $this->user->id);

        if ($request->entry_date) {
            $collection->whereDate('entry_date', '=', $request->entry_date);
        }

        return response()->json($collection->get(), 201);
    }

    public function create(Request $request)
    {
        $this->validateAuthentication($request);

        $data = $request->get($this->dataKey);
        $data = array_merge($data, [
            'user_id' => $this->user->id
        ]);

        $entry = Entry::create($data);

        return response()->json($entry, 201);
    }
}
