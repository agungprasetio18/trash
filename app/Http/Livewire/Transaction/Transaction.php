<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;

class Transaction extends Component
{
    public  $i = 1;
    public $inputs = [];

    public function add($i)
    {
        $i += 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }
    public function render()
    {
        return view('livewire.transaction.transaction');
    }
}
