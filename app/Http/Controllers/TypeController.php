<?php

namespace App\Http\Controllers;

use App\Repositories\TypeRepository;
use App\Services\TypeService;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $type;

    public function __construct(TypeService $service)
    {
        $this->type = $service;
    }

    public function search(Request $request, TypeRepository $type)
    {
        return $type->search($request->name);
    }

    public function trash()
    {
        return view('type.trash');
    }

    public function trashDatatables()
    {
        return $this->type->getTrashDatatables();
    }

    public function restore($id)
    {
        $this->type->restoreData($id);

        return response()->json('Sukses Memulihkan Tipe');
    }

    public function remove($id) 
    {
        $this->type->removeData($id);

        return response()->json("Sukses Menghapus Selamanya");
    }
}
