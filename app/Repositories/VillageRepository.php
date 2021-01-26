<?php 

namespace App\Repositories;

use App\Models\Village;

class VillageRepository {

    protected $village;

    public function __construct(Village $village)
    {
        $this->village = $village;
    }

    public function search(string $name = null)
	{
        return $this->village->select('id', 'name')->where('name', 'like', '%'.$name.'%')->get();
    }

    public function getTrash()
    {
        return $this->village->onlyTrashed()->get();
    }

    public function findTrash($id)
    {
        return $this->village->onlyTrashed()->find($id);
    }
}




?> 