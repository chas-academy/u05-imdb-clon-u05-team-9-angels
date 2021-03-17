<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        if ($superUser) {
            $user = User::find($request->all('id')['id']);
            $user->name = ($request->all('name')['name']);
            $user->email = ($request->all('email')['email']);
            $user->type = ($request->all('type')['type']);
            $user->save();

            return view('dashboard.edit', ['user' => $user]);
        } else {
            return redirect('/');
        }
    }

    protected function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return $this->getUsersForAdmin();
    }

    protected function create()
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'type' => request('type'),
        ]);

        return $this->getUsersForAdmin();
    }
}