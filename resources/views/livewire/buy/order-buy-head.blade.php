<div>
    <div class="card-body"  id="head-div" name="head-div" style="pointer-events: all;border:1px solid #9e9e9e; " >

        <div class="row" >
            <div class="col-md-auto">
                <label  for="order_no" class="form-label-me ">رقم الفاتورة</label>
                <input wire:model="order_no"  wire:keydown.enter="$emit('gotonext','orderno')" type="text" class=" form-control "
                       id="order_no" name="order_no" style="width: 80px;">
                @error('order_no') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-auto">
                <label for="date" class="form-label-me">التاريخ</label>
                <input wire:model="order_date" wire:keydown.enter="$emit('gotonext','date')"
                       class="form-control  "
                       name="date" type="date"  id="date" style="width: 110px;padding: 4px;">
                @error('order_date') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-1">
                <label  for="jehano" class="form-label-me">المورد</label>
                <input wire:model="jeha" wire:keydown.enter="$emit('gotonext','jehano')"
                       class="form-control  " style="width: 80px;"
                       name="jehano" type="text"  id="jehano" >
                @error('jeha') <span class="error">{{ $message }}</span> @enderror
                @error('jeha_type') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div   class="col-md-3" style="width: 270px;padding: 0;">
            <label id="jehalabel" for="select2-dropdown" class="form-label-me">{{"$jeha_name"}}</label>
                @livewire('select2-dropdown')
            </div>

            <div class="col-md-1">
                <label  for="storeno" class="form-label-me">المخزن</label>
                <input  wire:model="st_no" wire:keydown.enter="$emit('gotonext','storeno')"
                       class="form-control  " style="width: 80px;"
                       name="storeno" type="text"  id="storeno" >
                @error('st_no') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div  class="col-md-3" style="width:190px; ">
                <label  class="form-label-me">اختيار من القائمة</label>
                <select  wire:model="store" name="store_id" id="store_id" class="form-control  form-select "
                         style=" vertical-align: middle ;font-size: 12px;height: 26px;width: 160px; padding-bottom:0;padding-top: 0;" >
                    <option value="1">المخزن الرئيسي</option>
                    @foreach($stores_names as $s)
                        <option value="{{ $s->st_no }}">{{ $s->st_name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-2" style="width:100px;" >
                <i  id="head-btn" style="margin-top: 18px;"
                    class=" btn btn-outline-success btn-rounded waves-effect waves-light fas fa-save adventuresome"
                    wire:click="BtnHeader"> موافق </i>
            </div>

        </div> <!-- // end row  -->
    </div> <!-- End card-body -->
</div>

@push('scripts')
    <script type="text/javascript">
        Livewire.on('jehachange',postid=>{

            $("#jehano").focus();
        })

        Livewire.on('gotonext',postid=>  {

            if (postid=='orderno') {  $("#date").focus(); };
            if (postid=='date') {  $("#jehano").focus(); };
            if (postid=='jehano') {  $("#storeno").focus(); };

            if (postid=='store_id') {  $("#head-btn").active=true};
        })

        Livewire.on('head-btn-click',postid=> {

            document.getElementById("data-div").style.pointerEvents = "";
            $('#store_id').prop('disabled', 'disabled');
            let the_store = document.getElementById("store_id").value;



        });




    </script>
@endpush
