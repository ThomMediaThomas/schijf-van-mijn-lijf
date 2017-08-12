<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Base
{
    protected $dataKey = 'user';
    protected $modelClass = 'User';

    public function me(Request $request)
    {
        $user = $this->authenticate($request);

        if ($user) {
            return response()->json($user, 201);
        } else {
            return response()->json([
                'error' => 'Not authenticated'
            ], 401);
        }
    }

    public function update(Request $request, $id)
    {
        $user = $this->authenticate($request);

        if ($user->id == $id) {
            $this->validateAuthentication($request);
            $data = $request->get($this->dataKey);
            $model = call_user_func('App\\Models\\' . $this->modelClass . '::find', $id);
            $model->update($data);

            return response()->json($model, 201);
        } else {
            return response()->json([
                'error' => 'Not authenticated'
            ], 401);

        }
    }
}
