<?php

namespace App\Http\Controllers;

use App\Repositories\TypeRepository;

use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function search(Request $request, TypeRepository $type)
    {
        return $type->search($request->name);
    }
}
