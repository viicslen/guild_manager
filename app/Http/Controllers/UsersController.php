<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show($id)
    {
        return response()->view('users.view', ['user' => User::find($id)]);
    }

    public function own()
    {
        return $this->show(Auth::user()->id);
    }
}
