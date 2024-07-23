<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        $title = 'Delete Account';
        $text  = 'Are you sure you want to delete this account?';
        confirmDelete($title, $text);

        return view('admin.pages.account', compact('users'));
    }

    public function create(){
        return view('admin.pages.createAccount');
    }

    public function store(Request $request){
        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required|min:6',
            'roles'     => 'required'
        ]);

        $data['name']       = $request->name;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);
        $data['roles']      = $request->roles;

        User::create($data);

        return redirect()->route('account.index')->with('success', 'Account Created Successfully!');
    }

    public function edit(string $id){
        $user = User::findOrFail($id);
        return view('admin.pages.editAccount', compact('user'));
    }

    public function update(Request $request, string $id){
        $user = User::findOrFail($id);

        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'roles'     => 'required'
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'roles' => $request->roles,
        ]);

        return redirect()->route('account.index')->with('success', 'Account has been edited.');
    }

    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('account.index')->with('success', 'Account has been deleted.');
    }
}
