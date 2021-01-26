<?php

namespace App\Http\Controllers;

use App\Repositories\VillageRepository;
use App\Services\VillageService;

use Illuminate\Http\Request;

class VillageController extends Controller
{
    protected $service;
    protected $repo;

    public function __construct(VillageService $service, VillageRepository $repo)
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
        return view('village.trash');
    }

    public function restore($id)
    {
        $this->service->restoreData($id);

        return response()->json('Sukses Memulihkan Tipe');

    }

    public function remove($id)
    {
        $this->service->removeData($id);

        return response()->json("Sukses Menghapus Selamanya");
    }

    public function trashDatatables()
    {
        return $this->service->getTrashDatatables();
    }
}
