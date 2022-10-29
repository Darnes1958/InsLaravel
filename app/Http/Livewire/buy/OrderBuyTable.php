<?php

namespace App\Http\Livewire\Buy;

use Livewire\Component;

class OrderBuyTable extends Component
{
   public $ksm;
   public $madfooh;
   public $tot1;
   public $tot;
   public $orderdetail=[];

   protected $listeners = [
        'putdata','gotonext','ChkIfDataExist'
    ];

   public function ChkIfDataExist($witem_no){

     $One= array_column($this->orderdetail, 'item_no');
     $index = array_search( $witem_no, $One);
     if  ( $index ) {
         $this->emit('YesIsFound',$this->orderdetail[$index]['quant'],
                                          $this->orderdetail[$index]['price']);

     }
   }
   public function gotonext($value)
   {
       $this->ksm = number_format($this->ksm,2, '.', '');
       $this->madfooh = number_format($this->madfooh,2, '.', '');
   }
    protected function rules()
    {
        return [
            'ksm' => ['required','numeric','gte:0','lte:tot1'],
            'madfooh' =>   ['required','numeric','gte:0','lte:tot'],
        ];
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

   public function updatedKsm() {

       $this->tot = number_format($this->tot1-$this->ksm,
           2, '.', '');
   }

    public function putdata($value)
    {
        $One= array_column($this->orderdetail, 'item_no');
        $index = array_search( $value['item_no'], $One);
        if  ($index) {
            $this->orderdetail[$index]['item_no']=$value['item_no'];
            $this->orderdetail[$index]['item_name']=$value['item_name'];
            $this->orderdetail[$index]['price']=$value['price'];
            $this->orderdetail[$index]['quant']=$value['quant'];
            $this->orderdetail[$index]['subtot']=
                number_format($value['price']*$value['quant'], 2, '.', '');
        }
        else {
            $this->orderdetail[] =
                ['item_no' => $value['item_no'], 'item_name' => $value['item_name'],
                    'quant' => $value['quant'], 'price' => $value['price'],
                    'subtot' => number_format($value['price'] * $value['quant'], 2, '.', '')];
        }
            $this->tot1 = number_format(array_sum(array_column($this->orderdetail, 'subtot')),
                2, '.', '');
            $this->tot = number_format($this->tot1 - $this->ksm,
                2, '.', '');
        $this->emit('ClearData');
    }
    public function removeitem($value)    {
            unset($this->orderdetail[$value]);
            array_values($this->orderdetail);
            $this->emit('ClearData');
    }
    public function edititem($value)
    {
      $this->emit( 'edititem',$this->orderdetail[$value]) ;
    }
    public function mount()
    {

        $this->orderdetail=[
            ['item_no'=>'0','item_name'=>'',
                'quant'=>'0','price'=>'0',
                'subtot'=>'0']
        ];

        $this->ksm=number_format(0, 2, '.', '');
        $this->madfooh=number_format(0, 2, '.', '');
        $this->tot1=number_format(0, 2, '.', '');
        $this->tot=number_format(0, 2, '.', '');

    }

    public function render()
    {
        return view('livewire.buy.order-buy-table',$this->orderdetail);
    }
}
