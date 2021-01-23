<?php 

namespace App\Repositories;

use App\Models\Type;

class TypeRepository {

    protected $type;

    public function __construct(Type $type)
    {
        $this->type = $type;
    }

    public function search(string $name = null)
	{
        return $this->type->select('id', 'name')->where('name', 'like', '%'.$name.'%')->get();
    }
}




?> 