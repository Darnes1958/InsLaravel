<div class="card col-md-4 " style="border:1px solid black;">

    <div class=" col-md-auto " style="padding :10px 15px 0 0;">


        @livewire('buy.item-drop-down')
    </div>
    <div class=" col-md-auto " style="padding :10px 15px 0 0;">
    <div class="row" >
         <div class="col-4" >
             <label  for="itemno" class="form-label-me ">رقم الصنف</label>
             <input wire:model="item"  wire:keydown.enter="$emit('gotonext','quant')" type="text" class=" form-control "
                    id="itemno" name="itemno" >

         </div>
        <div class="col-8">
            <textarea wire:model="item_name" name="item_name" rows="2" cols="25"
                       style="font-size: 12px;height: 52px;color: #0b5ed7;"
                       readonly id="item_name" placeholder="اسم الصنف"></textarea>

            @error('item') <span class="error">{{ $message }}</span> @enderror
        </div>

    </div>
    </div>
    <div class="row" >
      <div class="col-6 ">
            <label for="quant" class="form-label-me " >الكمية</label>
            <input wire:model="quant" wire:keydown.enter="$emit('gotonext','price')"
                   class="form-control " name="quant" type="text" value="1"
                   id="quant"   >
            @error('quant') <span class="error">{{ $message }}</span> @enderror
      </div>
      <div class="col-6 ">
                <label for="raseed" class="form-label-me" >الرصيد الكلي</label>
                <input wire:model="raseed" class="form-control " name="raseed" type="text" readonly
                       id="raseed"   >
      </div>
    </div>
    <div class="row" >
       <div class="col-6">
            <label for="price" class="form-label-me">السعر</label>
            <input wire:model="price" wire:keydown.enter="ChkItem" class="form-control" name="price" type="text" value=""
                   id="price"   >
            @error('price') <span class="error">{{ $message }}</span> @enderror
       </div>
        <div class="col-6 ">
            <label for="st_raseed" class="form-label-me " >رصيد المخزن</label>
            <input wire:model="st_raseed" class="form-control " name="st_raseed" type="text" readonly
                   id="st_raseed"   >
        </div>
    </div>


</div>

@push('scripts')
    <script type="text/javascript">
        Livewire.on('itemchange',postid=>{

            $("#itemno").focus();
        });

        Livewire.on('gotonext',postid=>  {

            if (postid=='quant') {  $("#quant").focus(); };
            if (postid=='item_no') {  $("#itemno").focus(); };
            if (postid=='price') {  $("#price").focus(); };
        });
        Livewire.on('TakeData',postid=>
         {
          
            var formData = {};
            formData["item_no"] = document.getElementById("itemno").value;
            formData["item_name"] = document.getElementById("item_name").value;
            formData["quant"] = document.getElementById("quant").value;
            formData["price"] = document.getElementById("price").value;

             Livewire.emit('putdata',formData);

        });

    </script>
@endpush

