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
        $collection = ProgressModel::where('user_id', $this->user->id)
            ->orderBy('progress_date', 'asc');

        $firstDate = $this->createDateFromString($collection->get()->first()->progress_date);
        $lastDate = $this->createDateFromString($collection->get()->last()->progress_date);
        $allDates = $this->generateDateRange($firstDate, $lastDate);

        //created formatted progress
        $formattedProgress = [];
        foreach ($allDates as $date) {
            $dateData = array(
                'progress_date' => $date
            );

            $progress = ProgressModel::where('user_id', $this->user->id)
                ->where('progress_date', $date)
                ->first();

            if ($progress) {
                $dateData['progress'] = $progress->toArray();
                $dateData['user_input'] = true;
            } else {
                $dateData['user_input'] = false;
            }

            array_push($formattedProgress, $dateData);
        }

        //calc empty days
        $lastUserInput = null;
        $nextUserInput = null;
        $nextUserInputDiff = null;
        foreach ($formattedProgress as $index=>$date) {
            if ($date['user_input'] == true) {
                $lastUserInput = $date['progress'];
                $nextUserInput = null;
                $nextUserInputDiff = 0;
            } else {
                $rightFormattedProgress = array_slice($formattedProgress, $index);

                if (!$nextUserInput) {
                    foreach ($rightFormattedProgress as $innerDate) {
                        $nextUserInputDiff++;
                        if ($innerDate['user_input'] == true) {
                            $nextUserInput = $innerDate['progress'];
                            break;
                        }
                    }
                }

                $calculatedDiff = ($lastUserInput['weight'] - $nextUserInput['weight']) / $nextUserInputDiff;
                if ($formattedProgress[$index-1]) {
                    $previousWeight = $formattedProgress[$index - 1]['progress']['weight'];
                }

                $date['progress'] = array(
                    'weight' => $previousWeight - $calculatedDiff
                );

                $formattedProgress[$index] = $date;
            }
        }


        return response()->json($formattedProgress, 201);
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
