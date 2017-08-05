<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Base extends Controller
{
    protected $modelClass;

    protected $user;

    public function validateAuthentication(Request $request) {
        $user = $this->authenticate($request);

        if (!$user) {
            return response()->json([
                'error' => 'Not authenticated'
            ], 401);
        }
    }

    public function authenticate(Request $request)
    {
        if ($request && isset($request->authentication)) {
            $authentication = $request->authentication;

            if (isset($authentication['username']) && isset($authentication['password'])) {
                $user = User::where('username', $authentication['username'])
                    ->where('password', $authentication['password'])
                    ->first();

                if ($user) {
                    $this->user = $user;
                    return $user;
                } else {
                    return null;
                }
            }

            return null;
        }

        return null;
    }

    public function index(Request $request)
    {
        $this->validateAuthentication($request);
        $collection = call_user_func('App\\Models\\' . $this->modelClass . '::all');
        return response()->json($collection, 201);
    }

    public function show(Request $request, $id)
    {
        $this->validateAuthentication($request);
        $model = call_user_func('App\\Models\\' . $this->modelClass . '::find', $id);
        return response()->json($model, 201);
    }

    public function update(Request $request, $id)
    {
        $this->validateAuthentication($request);
        $data = $request->get($this->dataKey);
        $model = call_user_func('App\\Models\\' . $this->modelClass . '::find', $id);
        $model->update($data);

        return response()->json($model, 201);
    }

    public function create(Request $request)
    {
        $this->validateAuthentication($request);
        $data = $request->get($this->dataKey);
        $model = call_user_func('App\\Models\\' . $this->modelClass . '::create', $data);

        return response()->json($model, 201);
    }

    public function delete(Request $request, $id)
    {
        $this->validateAuthentication($request);
        $model = call_user_func('App\\Models\\' . $this->modelClass . '::find', $id);
        $model->delete();
        return response()->json(true, 201);
    }
}
