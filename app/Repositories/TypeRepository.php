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
        return $this->type->select('id', 'name', 'price')->where('name', 'like', '%'.$name.'%')->get();
    }

    public function tangkap(string $id = null)
    {
        return $this->type->find($id);
    }

    public function getTrash()
    {
        return $this->type->onlyTrashed()->get();
    }

    public function findTrash($id)
    {
        return $this->type->onlyTrashed()->find($id);
    }
}




?> 