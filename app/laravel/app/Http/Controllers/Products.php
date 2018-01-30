<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Entry;
use App\Models\Portion;
use App\Models\Product;
use Illuminate\Http\Request;

class Products extends Base
{
    protected $dataKey = 'product';
    protected $modelClass = 'Product';

    public function search(Request $request)
    {
        $this->validateAuthentication($request);

        if ($request->name) {
            $collection = Product::join('brands', 'products.brand_id', 'brands.id')
                ->where('products.name', 'LIKE', '%' . $request->name . '%')
                ->orWhere('brands.name', 'LIKE', '%' . $request->name . '%')
                ->select('products.*')
                ->get();
        }

        return response()->json($collection, 201);
    }

    public function create(Request $request)
    {
        $this->validateAuthentication($request);

        $data = $request->get($this->dataKey);
        $data = array_merge($data, [
            'user_id' => $this->user->id
        ]);

        $data = $this->createBrandIfNotExists($data);

        $product = Product::create($data);
        $this->addPortions($data, $product);
        $product->load('portions');

        return response()->json($product, 201);
    }

    /**
     * @param $data
     * @return mixed
     */
    private function createBrandIfNotExists($data)
    {
        if (isset($data['brand'])) {
            $existingBrand = Brand::where('name', 'LIKE', $data['brand'])->first();

            if ($existingBrand) {
                unset($data['brand']);
                $data['brand_id'] = $existingBrand->id;
            } else {
                $newBrand = Brand::create(['name' => $data['brand']]);
                unset($data['brand']);
                $data['brand_id'] = $newBrand->id;
            }
        }

        return $data;
    }

    private function addPortions($data, Product $product) {
        if (isset($data['portions'])){
            foreach ($data['portions'] as $portion) {
                Portion::create([
                    'name' => $portion['name'],
                    'unit' => $portion['unit'],
                    'size' => $portion['size'],
                    'product_id' => $product->id,
                ]);
            }
        } else {
            $this->addDefaultPortion($product);
        }

        //create empty portion
        Portion::create([
            'name' => 'gr',
            'unit' => 'gr',
            'size' => 1,
            'product_id' => $product->id,
        ]);
    }

    /**
     * @param Product $product
     */
    private function addDefaultPortion (Product $product) {
        Portion::create([
            'name' => 'Portie',
            'unit' => 'gr',
            'size' => 100,
            'product_id' => $product->id,
        ]);

    }
}
