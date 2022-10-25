<?php

namespace App\Http\Livewire;

use App\Models\jeha\jeha;
use Livewire\Component;

class Select2Dropdown extends Component
{
    public $select_no = '';

    public $select_name ;

    public function render()
    {
        $this->select_name=jeha::where('jeha_type',2)->where('available',1)->get();
        return view('livewire.select2-dropdown');
    }
}
