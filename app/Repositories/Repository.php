<?php 

namespace App\Repositories;

class Repository {

	public $model;

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function update(int $id, array $data)
	{
		$model = $this->find($id);
		$model->update($data);

		return $model;
	}

	public function delete(int $id)
	{
		$this->find($id)->delete();
	}

	public function get()
	{
		return $this->model->get();
	}

	public function find(int $id)
	{
		return $this->model->findOrFail($id);
	}

	public function count(): Int
	{
		return $this->model->count();
	}

}

 ?>