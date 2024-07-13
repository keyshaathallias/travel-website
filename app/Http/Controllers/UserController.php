<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.pages.account', compact('users'));
    }

    public function edit(){

    }

    public function destroy(){

    }
}
