<?php 

namespace App\Repositories;

use App\Models\Member;

class MemberRepository {

    protected $model;

    public function __construct(Member $model)
    {
        $this->model = $model;
    }

    public function get()
    {
        return $this->model->select('id', 'name', 'gender', 'phone', 'address', 'village_id')->with('village')->get();
    }

    public function search(string $name = null): Object
	{
		return $this->model->select('id', 'name')->where('name', 'like', '%'.$name.'%')->get();
	}
}






?>