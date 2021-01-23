<?php

namespace App\Http\Livewire\Village;

use App\Models\Village;

use Livewire\Component;

class Create extends Component
{

	public $name;

	protected $rules = [
		'name' => 'required|string|unique:villages'
	];

	public function store(Village $village)
	{
		$data = $this->validate();

		$village->create($data);

		$this->emit('refresh', 'Sukses Menambah Desa');
		$this->reset('name');
	}

    public function render()
    {
        return view('livewire.village.create');
    }
}
