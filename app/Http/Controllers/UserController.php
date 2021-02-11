<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index($id)
    {
        $user = User::where('id', $id)->first();
        return view('user', [
            'user' => $user,
        ]);
    }
}