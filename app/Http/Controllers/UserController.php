<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\User\CreateUser;
use App\Http\Requests\User\UpdateUser;

use Illuminate\Http\Request;


class UserController extends Controller
{   
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(CreateUser $request)
    {
        User::create($request->all());

        return redirect('/user')->with('success', 'Sukses Menambahkan Operator');
    }

    public function edit(User $user)
    {   
        return view('user.edit', compact('user'));
    }

    public function update(UpdateUser $request, User $user)
    {
        $user->update($request->all());

        return redirect('/user')->with('success', 'Sukses Mengedit Operator');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json('Sukses Menghapus Operator');
    }

    public function datatables(UserService $user)
    {
        return $user->getDataTables();
    }
}
