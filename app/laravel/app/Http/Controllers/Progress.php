<?php

namespace App\Http\Controllers;

use App\Models\Progress as ProgressModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Progress extends Base
{
    protected $dataKey = 'progress';
    protected $modelClass = 'Progress';

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->validateAuthentication($request);
        $formattedProgress = [];
        $collection = ProgressModel::where('user_id', $this->user->id)
            ->orderBy('progress_date', 'asc');

        if ($request->start_date) {
            $collection->whereDate('progress_date', '>=', $request->start_date);
        }

        return response()->json($collection->get(), 201);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $this->validateAuthentication($request);

        $data = $request->get($this->dataKey);
        $data = array_merge($data, [
            'user_id' => $this->user->id
        ]);

        $progress = ProgressModel::where('user_id', $this->user->id)
            ->where('progress_date', $data['progress_date'])
            ->first();

        if ($progress) {
            $progress->update($data);
        } else {
            $progress = ProgressModel::create($data);
        }

        return response()->json($progress, 201);
    }

    /**
     * @param $date
     * @return static
     */
    private function createDateFromString($date)
    {
        $dateArray = explode('-', $date);
        return Carbon::createFromDate($dateArray[0], $dateArray[1], $dateArray[2]);
    }


    /**
     * @param Carbon $start_date
     * @param Carbon $end_date
     * @return array
     */
    private function generateDateRange(Carbon $start_date, Carbon $end_date)
    {
        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        return $dates;
    }
}
