<?php

namespace App\Http\Livewire\Buy;

use Livewire\Component;

class OrderBuyTable extends Component
{



    protected $listeners = [
        'putdata'
    ];
    public function putdata($value)
    {
        session()->flash('message', 'Put Data.');
        $this->emit('PushData',$value);
    }
    public function render()
    {
        return view('livewire.buy.order-buy-table');
    }
}
