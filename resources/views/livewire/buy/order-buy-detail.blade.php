<div class="card col-md-4 " style="border:1px solid black;">

    <div class=" col-md-auto " style="padding :10px 15px 0 0;">


        @livewire('buy.item-drop-down')
    </div>
    <div class=" col-md-auto " style="padding :10px 15px 0 0;">
    <div class="row" >
         <div class="col-3" >
             <label  for="item_no" class="form-label-me ">رقم الصنف</label>
             <input wire:model="item_no"  wire:keydown.enter="$emit('gotonext','quant')" type="text" class=" form-control "
                    id="item_no" name="item_no" >
             @error('item_no') <span class="error">{{ $message }}</span> @enderror
         </div>
        <div class="col-8">
            <label  for="item_name" class="form-label-me ">اسم الصنف</label>
            <input  wire:model="item_name" type="text" class="form-control"   id="item_name" name="item_name" >
        </div>

    </div>
    </div>

    <div class="col-md-6 ">
        <div class="md-3 " >
            <label for="example-text-input" class="form-label-me " >الكمية</label>
            <input class="form-control example-date-input" name="quant" type="text" value="1"
                   id="quant"   >
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="md-3">
            <label for="example-text-input" class="form-label-me">السعر</label>
            <input class="height26 form-control example-date-input" name="price" type="text" value=""
                   id="price"   >
        </div>
    </div>

</div>

@push('scripts')
    <script type="text/javascript">
        Livewire.on('itemchange',postid=>{

            $("#item_no").focus();
        });

        Livewire.on('gotonext',postid=>  {

            if (postid=='quant') {  $("#quant").focus(); };
            if (postid=='item_no') {  $("#item_no").focus(); };
            if (postid=='price') {  $("#price").focus(); };


        });


    </script>
@endpush

