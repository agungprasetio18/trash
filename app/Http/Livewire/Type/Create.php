<?php

namespace App\Http\Livewire\Type;

use Livewire\Component;
use App\Models\Type;

class Create extends Component
{
    public $name, $price;

    protected $rules = [
        'name' => 'required|string|unique:types',
        'price' => 'required|numeric'
    ];

    public function store(Type $type)
    {
        $data = $this->validate();

        $type->create($data);

        $this->emit('refresh', 'Sukses Menambah Tipe');
        $this->reset('name', 'price');

    }
    public function render()
    {
        return view('livewire.type.create');
    }
}
