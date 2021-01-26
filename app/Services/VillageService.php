<?php

namespace App\Services;

use App\Models\Village;

use App\Repositories\VillageRepository;

use Yajra\Datatables\Datatables;

class VillageService {

  protected $repo;

  public function __construct(VillageRepository $repo)
  {
    $this->repo = $repo;
  }

  public function restoreData($id)
    {
        $type = $this->repo->findTrash($id);
        $type->update(['deleted_by'=>null]);
        $type->restore();
    }

    public function removeData($id)
    {
        $type = $this->repo->findTrash($id);
        $type->forceDelete();
    }

  public function getTrashDatatables()
  {
      $datatables = Datatables::of($this->repo->getTrash())
        ->addIndexColumn()
        ->addColumn('action', function ($member)
        {
          return '
            <button class="btn btn-sm btn-success restore"><i class="fa fa-undo"></i></button>
            <button class="btn btn-sm btn-danger deletePerm"><i class="fa fa-trash"></i></button>
          ';
        })
        ->rawColumns(['action'])
        ->make();

  return $datatables;
  }


}

?>