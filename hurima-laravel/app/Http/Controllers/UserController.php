<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UserService;

class UserController extends Controller
{
    public function updateProfile(Request $request)
    {
        UserService::updateProfile($request);
    }

    public function userinfo($id)
    {
        return UserService::userinfo($id);
    }
}
