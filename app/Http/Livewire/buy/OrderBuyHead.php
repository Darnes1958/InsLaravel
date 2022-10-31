<?php

namespace App\Http\Livewire\Buy;

use App\Models\buy\buys;
use App\Models\jeha\jeha;
use App\Models\stores\items;
use App\Models\stores\stores;
use App\Models\stores\stores_names;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class OrderBuyHead extends Component
{
    public $order_no;
    public $order_date;
    public $jeha;
    public $jeha_type;
    public $st_no;
    public $st_name;
    public $jeha_name;

    public $HeadOpen;
    public $OrderDataOpen;

    protected $listeners = [
        'jehachange','mounthead'
    ];
    public function mounthead(){
        $this->mount();
    }
//
    public function jehachange($value)
    {
        if(!is_null($value))
            $this->jeha = $value;
        $this->updatedJeha();
        $this->emit('gotonext', 'date');
    }

    public function updatedJeha()
    {
        Config::set('database.connections.other.database', Auth::user()->company);
        $this->jeha_name='';
        $this->jeha_type=0;
        if ($this->jeha!=null) {
        $result = jeha::where('jeha_type',2)->where('jeha_no',$this->jeha)->first();

        if ($result) {  $this->jeha_name=$result->jeha_name;
                        $this->jeha_type=$result->jeha_type; }}
    }

    protected function rules()
    {
        Config::set('database.connections.other.database', Auth::user()->company);
        return [
            'order_no' => ['required','integer','gt:0', 'unique:other.buys,order_no'],
            'order_date' => 'required',
            'jeha_type' => ['integer','size:2'],
            'st_no' => ['required','integer','gt:0', 'exists:other.stores_names,st_no'],
        ];
    }
    protected $messages = [
        'required' => 'لا يجوز ترك فراغ',
        'unique' => 'هذا الرقم مخزون مسبقا',
        'size' => 'هذا العميل ليس من الموردين',
        'order_date.required'=>'يجب ادخال تاريخ صحيح',
    ];

    public function mount()
    {
        Config::set('database.connections.other.database', Auth::user()->company);
        $this->order_no=buys::max('order_no')+1;
        $this->order_date=date('Y-m-d');
        $this->st_no='1';
        $this->st_name='المخزن الرئيسي';
        $this->jeha='2';
        $this->jeha_name='مشتريات عامة';
        $this->jeha_type='2';
        $this->HeadOpen=True;
        $this->OrderDataOpen=False;

    }

    public function BtnHeader()
    {
        $this->validate();
        $this->emit('HeadBtnClick',$this->order_no,$this->order_date,$this->jeha,$this->st_no);
        $this->emit('mountdetail');
        $this->HeadOpen=false;
        $this->OrderDataOpen=True;
    }

    public $store;
    public function updatedStore()
    {
        $this->emit('gotonext', 'store_id');
    }

    public function render()
    {

        Config::set('database.connections.other.database', Auth::user()->company);
        return view('livewire.buy.order-buy-head',[
            'jeha'=>jeha::where('jeha_type',2)->where('available',1)->get(),
            'stores'=>stores::where('raseed','>',0)->get(),
            'stores_names'=>stores_names::all(),
            'items'=>items::on('other')->where('raseed','>',0)->get(),
           'jeha_name'=>$this->jeha_name,
           // 'date' => date('Y-m-d'),
           // 'wid' => buys::max('order_no')+1,
        ]);
    }
}
