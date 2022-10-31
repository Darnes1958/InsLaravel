<div x-data="{ $wire.DetailOpen: false }">
<div class="card col-md-auto " style="border:1px solid #9d9d9d;">
    <div  x-show="$wire.DetailOpen" class="col-md-auto" >
        @livewire('buy.item-drop-down')
    </div>
    <div class="row" >
        <div class="col-md-4" >
             <label  for="itemno" class="form-label-me ">رقم الصنف</label>
             <input wire:model="item"  wire:keydown.enter="$emit('gotonext','quant')"  x-bind:disabled="!$wire.DetailOpen"
                     type="text" class=" form-control "  id="itemno" name="itemno" style="text-align: center">
         </div>
        <div class="col-md-8">
            <label  for="item_name" class="form-label-me ">اسم الصنف</label>
            <textarea wire:model="item_name" name="item_name" class="form-control"
                      style="color: #0b5ed7; "
                       readonly id="item_name" placeholder="اسم الصنف"></textarea>
            <br>

            @error('item') <span class="error">{{ $message }}</span> @enderror
        </div>

    </div>

    <div class="row" >
      <div class="col-6 ">
            <label for="quant" class="form-label-me " >الكمية</label>
            <input wire:model="quant" wire:keydown.enter="$emit('gotonext','price')"  x-bind:disabled="!$wire.DetailOpen"
                   class="form-control " name="quant" type="text" value="1"
                   id="quant"  style="text-align: center" >
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
                   id="price"  style="text-align: center"  x-bind:disabled="!$wire.DetailOpen">
           <br>
            @error('price') <span class="error">{{ $message }}</span> @enderror
       </div>
        <div class="col-6 ">
            <label for="st_raseed" class="form-label-me " >رصيد المخزن</label>
            <input wire:model="st_raseed" class="form-control " name="st_raseed" type="text" readonly
                   id="st_raseed"   >
        </div>
    </div>


</div>
</div>

@push('scripts')
    <script type="text/javascript">
        Livewire.on('itemchange',postid=>{

            $("#itemno").focus();
        });

        Livewire.on('gotonext',postid=>  {

            if (postid=='quant') {  $("#quant").focus();  $("#quant").select();};
            if (postid=='item_no') {  $("#itemno").focus(); $("#itemno").select();};
            if (postid=='price') {  $("#price").focus(); $("#price").select();};
        });


    </script>
@endpush

