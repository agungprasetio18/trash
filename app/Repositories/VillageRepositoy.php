<?php 

namespace App\Repositories;

use App\Models\Village;

class TypeRepository {

    protected $village;

    public function __construct(Village $village)
    {
        $this->village = $village;
    }

    public function search(string $name = null)
	{
        return $this->village->select('id', 'name')->where('name', 'like', '%'.$name.'%')->get();
    }
}




?> 