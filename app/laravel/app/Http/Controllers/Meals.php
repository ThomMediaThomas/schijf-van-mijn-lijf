<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MealProduct;
use Illuminate\Http\Request;

class Meals extends Base
{
    protected $dataKey = 'meal';
    protected $modelClass = 'Meal';

    public function create(Request $request)
    {
        $this->validateAuthentication($request);

        $data = $request->get($this->dataKey);
        $data = array_merge($data, [
            'user_id' => $this->user->id
        ]);

        $meal = Meal::create($data);

        if (isset($data['products'])) {
            foreach ($data['products'] as $product) {
                $productData = array_merge($product, [
                    'user_id' => $this->user->id,
                    'meal_id' => $meal->id
                ]);

                MealProduct::create($productData);
            }
        }

        $reloadMeal = Meal::find($meal->id);

        return response()->json($reloadMeal, 201);
    }

    public function search(Request $request)
    {
        $this->validateAuthentication($request);

        if ($request->name) {
            $collection = Meal::where('name', 'LIKE', '%'. $request->name .'%')->get();
        }

        return response()->json($collection, 201);
    }
}
