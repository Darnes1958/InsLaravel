<?php

namespace App\Http\Livewire\Buy;

use App\Models\jeha\jeha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Livewire\Component;
use App\Models\stores\items;
use Illuminate\Support\Facades\DB;

class OrderBuyDetail extends Component
{
    public $item_no;
    public $item_name;
    public $st_raseed;
    public $raseed;

    protected $listeners = [
        'itemchange'
    ];

    public function itemchange($value)
    {
        if(!is_null($value))
            $this->item_no = $value;

        $this->updatedItem_no();

        $this->emit('gotonext', 'item_no');
    }
    public function updatedItem_no()
    {
        Config::set('database.connections.other.database', Auth::user()->company);
        if ($this->item_no!=null) {
          $result=DB::connection('other')->table('items')->where('item_no', $this->item_no)->first();



            if ($result) {  $this->item_name=$result->item_name;}}
    }

    protected function rules()
    {
        return [
            'item_no' => ['required','integer','gt:0', 'unique:other.items,item_no'],
            'quant' =>   ['required','integer','qt:0'],
            'price' =>   ['required','float'  ,'gt:0'],
        ];
    }
    protected $messages = [
        'required' => 'لا يجوز ترك فراغ',
        'unique' => 'هذا الرقم مخزون مسبقا',


    ];


    public function mount()
    {
        Config::set('database.connections.other.database', Auth::user()->company);
        $this->raseed=0;
        $this->st_raseed-0;
        $this->item_no=0;
        $this->item_name='';
    }
    public function render()
    {
        return view('livewire.buy.order-buy-detail');
    }
}
