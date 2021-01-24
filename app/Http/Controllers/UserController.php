<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\User\CreateUser;

use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $service;

	public function __construct(UserService $service)
	{
		$this->service = $service;
    }
    
    public function index()
    {
        // dd($this->service->getDataTables());
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
}
