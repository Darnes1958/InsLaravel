<?php

namespace App\Http\Livewire\Buy;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Livewire\Component;
use App\Models\stores\items;


class OrderBuyDetail extends Component
{
    public $item;
    public $item_name;
    public $st_raseed;
    public $raseed;
    public $quant;
    public $price;

    protected $listeners = [
        'itemchange'
    ];

    public function itemchange($value)
    {
        if(!is_null($value))
            $this->item = $value;

        $this->updatedItem();

        $this->emit('gotonext', 'item_no');
    }
    public function updatedItem()

    {
        $this->item_name='';
        Config::set('database.connections.other.database', Auth::user()->company);
        if ($this->item!=null) {
          $result=items::with('iteminstore')->
           where('item_no', $this->item)->first();

            if ($result) {
                $this->item_name=$result->item_name;
                $this->price=$result->price_buy;
                $this->raseed= $result->raseed;
                $this->st_raseed=$result->iteminstore->raseed;

            }}
    }

    protected function rules()
    {
        Config::set('database.connections.other.database', Auth::user()->company);
        return [
            'item' => ['required','integer','gt:0', 'exists:other.items,item_no'],
            'quant' =>   ['required','integer','gt:0'],
            'price' =>   ['required','numeric'  ,'gt:0'],
        ];
    }
    protected $messages = [
        'required' => 'لا يجوز ترك فراغ',
        'unique' => 'هذا الرقم مخزون مسبقا',


    ];

    public function ChkItem()
    {
        $this->validate();

    }


    public function mount()
    {
        Config::set('database.connections.other.database', Auth::user()->company);
        $this->raseed=0;
        $this->st_raseed=0;
        $this->item=0;
        $this->item_name='';
        $this->quant=1;
        $this->price=0;
    }
    public function render()
    {
        return view('livewire.buy.order-buy-detail');
    }
}
