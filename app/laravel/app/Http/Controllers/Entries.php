<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Portion;
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

        if (isset($data['portion_name'])) {
            $usedPortion = Portion::find($data['portion_id']);
            $portion = Portion::create([
                'name' => $data['portion_name'],
                'unit' => $usedPortion->unit,
                'size' => (float)$data['amount'] * $usedPortion->size,
                'product_id' => $data['product_id']
            ]);

            $data['portion_id'] = $portion->id;
            $data['amount'] = 1;
        }

        $entry = Entry::create($data);

        return response()->json($entry, 201);
    }

    public function copy(Request $request)
    {
        $this->validateAuthentication($request);

        $data = $request->get('entries');
        $data = array_merge($data, [
            'user_id' => $this->user->id
        ]);

        $copiedEntries = [];

        if (isset($data['destination']) && isset($data['entries'])) {
            $entries = $data['entries'];
            foreach ($entries as $entry_id) {
                $entryToCopy = Entry::findOrFail($entry_id);
                $newEntry = $entryToCopy->replicate();
                $newEntry->entry_date = $data['destination'];
                $newEntry->save();
                $copiedEntries[] = $newEntry;
            }
        }

        return response()->json($copiedEntries, 201);
    }
}
