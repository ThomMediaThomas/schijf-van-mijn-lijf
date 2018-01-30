<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Mail;

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

    public function create(Request $request)
    {
        $this->validateAuthentication($request);

        $data = $request->get($this->dataKey);

        $existingUserByMail = UserModel::where('email', $data['email'])->first();
        if ($existingUserByMail) {
            return response()->json([
                'error' => 'Email exists',
                'friendly_message' => 'Wij hebben al een account met dit e-mailadres. Wil je toevallig liever inloggen?'
            ], 401);
        }

        $existingUserByUsername = UserModel::where('username', $data['username'])->first();
        if ($existingUserByUsername) {
            return response()->json([
                'error' => 'Username exists',
                'friendly_message' => 'De gekozen gebruikersnaam is helaas niet uniek.'
            ], 401);
        }

        $model = call_user_func('App\\Models\\' . $this->modelClass . '::create', $data);

        Mail::to($this->user->email)->send(new Welcome($model));

        return response()->json($model, 201);
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
