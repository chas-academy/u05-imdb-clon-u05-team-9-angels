<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected function getUsersForAdmin()
    {
        $userType = auth()->user()->type;
        $superUser = intval($userType) > 1 ? true : false;

        if ($superUser) {
            $users = User::all();
            return view('dashboard.users', ['users' => $users]);
        } else {
            return redirect('/');
        }
    }

    protected function editUser($id)
    {
        $userType = auth()->user()->type;
        $superUser = intval($userType) > 1 ? true : false;

        if ($superUser) {
            $user = User::where('id', $id)->get();
            return view('dashboard.edit', ['user' => $user[0]]);
        } else {
            return redirect('/');
        }
    }

    protected function store(Request $request)
    {
        $userType = auth()->user()->type;
        $superUser = intval($userType) > 1 ? true : false;
    }
}