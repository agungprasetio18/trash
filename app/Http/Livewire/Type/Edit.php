<?php

namespace App\Http\Livewire\Type;

use App\Models\Type;
use Livewire\Component;

class Edit extends Component
{
    public $isOpen;
    public $type;

    protected $listeners = ['edit'];

    protected $rules = [
        'type.name' => '',
        'type.price' => ''
    ];
    
    public function edit(Type $type)
    {   
        $this->isOpen = true;
        $this->type = $type;
        $this->resetValidation();
    }

    public function update()
	{
		$this->validate(array_merge($this->rules, [
            'type.name' => 'required|string|unique:types,name,'.$this->type->id,
            'type.price' => 'required|numeric'
		]));

		$this->type->save();

		$this->reset('isOpen');
		$this->emit('refresh', 'Sukses Mengedit Tipe');
	}

    public function render()
    {
        return view('livewire.type.edit');
    }
}
