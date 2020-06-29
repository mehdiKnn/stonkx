<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(User $user)
    {

        return view('admin.user.index', ['users' => $user->get()]);
    }

    public function delete($id, User $user)
    {
        $current = $user->find($id);
        if ($current) {
            $current->delete();
        }
        return redirect()->back();
    }

    public function create()
    {
        return view('admin.user.form');
    }

    public function store(User $user, Request $request)
    {
        $user->name = $request->fullname;
        $user->email = $request->mail;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->admin = $request->role;
        try {
            $user->save();
            return redirect()->route('admin.user.index');
        } catch (\Throwable $e) {
            $request->session()->flash('notif', "Une erreur est survenue lors de l'enregistrement");
            return redirect()->back()->withInput();

        }
    }

    public function edit($id, User $user)
    {
        $current = $user->find($id);
        return view('admin.user.form', ['user' => $current]);
    }

    public function update($id, User $user, Request $request){

        $current = $user->find($id);

        $current->name = $request->fullname;
        $current->email = $request->mail;
        $current->address = $request->address;
        $current->password = Hash::make($request->password);
        $current->admin = $request->role;
        try {
        $current->save();
            return redirect()->route('admin.user.index');
        } catch (\Throwable $e) {
            $request->session()->flash('notif', "Une erreur est survenue lors de la modification");
            return redirect()->back()->withInput();

        }
    }
}
