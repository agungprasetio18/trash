<?php

namespace App\Http\Controllers;

use App\Repositories\TypeRepository;
use App\Services\TypeService;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $service;
    protected $repo;

    public function __construct(TypeService $service, TypeRepository $repo)
    {
        $this->service = $service;
        $this->repo = $repo;
    }

    public function search(Request $request)
    {
        return $this->repo->search($request->name);
    }

    public function trash()
    {
        return view('type.trash');
    }

    public function trashDatatables()
    {
        return $this->service->getTrashDatatables();
    }

    public function restore($id)
    {
        $this->service->restoreData($id);

        return response()->json('Sukses Memulihkan Tipe');
    }

    public function restoreAll()
    {
        $type = $this->repo->getTrash()->restore();

        return response()->json("Sukses Memulihkan Semua Sampah Tipe");
    }

    public function remove($id) 
    {
        $this->service->removeData($id);

        return response()->json("Sukses Menghapus Selamanya");
    }

    public function removeAll()
    {
        $this->repo->getTrash()->forceDelete();

        return response()->json("Sukses Menghapus Semua Sampah Tipe");

    }

    
}
