<?php

namespace App\Http\Livewire\Type;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Type;

class Data extends Component
{
    use WithPagination;

    protected $listeners = ['refresh', 'delete'];
    protected $paginationTheme = 'bootstrap';

    public function delete(Type $type)
	{
		$type->delete();
		
		$this->refresh('Sukses Menghapus Data');
	}

    public function refresh(string $message)
    {
        session()->flash('success', $message);
    }

    public function render(Type $type)
    {
        $types = $type->paginate(5);

        return view('livewire.type.data', compact('types'));
    }
}
