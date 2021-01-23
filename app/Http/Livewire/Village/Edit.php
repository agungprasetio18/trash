<?php

namespace App\Http\Livewire\Village;

use App\Models\Village;
use Livewire\Component;

class Edit extends Component
{

	public $isOpen;
	public $village;

	protected $listeners = ['edit'];
	protected $rules = [
		'village.name' => ''
	];

	public function edit(Village $village)
	{
		$this->isOpen = true;
		$this->village = $village;
		$this->resetValidation();
	}

	public function update(){
		$this->validate(array_merge($this->rules, [
            'village.name' => 'required|string|unique:types,name,'.$this->village->id,
		]));

		$this->village->save();

		$this->reset('isOpen');
		$this->emit('refresh', 'Sukses Mengedit Desa');
	}

    public function render()
    {
        return view('livewire.village.edit');
    }
}
