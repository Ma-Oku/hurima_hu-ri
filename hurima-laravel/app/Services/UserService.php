<?php
namespace App\Services;

use App\Models\User;

class UserService {

    public function updateProfile($request)
    {
        auth()->user()->real_name = $request->real_name;
        auth()->user()->address = $request->address;
        auth()->user()->postal_code = $request->postal_code;
        auth()->user()->phone_number = $request->phone_number;
        auth()->user()->save();
    }

    public function userinfo($id)
    {
        return User::find($id)->load(['products','user_valuers' => function ($query) {
            $query->orderBy('created_at')->with('user:id,name');
        }]);
    }
}
