<?php

namespace App\Http\Livewire\Village;

use App\Models\Village;

use Livewire\Component;
use Livewire\WithPagination;

class Data extends Component
{

	use WithPagination;

	protected $listeners = ['refresh', 'delete'];
	protected $paginationTheme = 'bootstrap';

	public function delete(Village $village)
	{
		$village->delete();
		
		$this->refresh('Sukses Menghapus Data');
	}

	public function refresh(string $message)
	{
		session()->flash('success', $message);
	}

    public function render(Village $village)
    {
    	$villages = $village->paginate(5);

        return view('livewire.village.data', compact('villages'));
    }
}
