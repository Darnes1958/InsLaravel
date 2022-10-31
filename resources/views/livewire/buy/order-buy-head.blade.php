 <div>


  <div x-data x-show="$wire.HeadOpen">

    <div class="card col-md-auto " style="border:1px solid #9d9d9d;">
          <div class="row" >
            <div class="col-md-4">
                <label  for="order_no" class="form-label-me ">رقم الفاتورة</label>
                <input wire:model="order_no"  wire:keydown.enter="$emit('gotonext','orderno')" type="text" class=" form-control "
                       id="order_no" name="order_no"  autofocus >
                @error('order_no') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-4">
                <label for="date" class="form-label-me">التاريخ</label>
                <input wire:model="order_date" wire:keydown.enter="$emit('gotonext','date')"
                       class="form-control  "
                       name="date" type="date"  id="date" >
                @error('order_date') <span class="error">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                <label  for="jehano" class="form-label-me">المورد</label>
                <input wire:model="jeha" wire:keydown.enter="$emit('gotonext','jehano')"
                       class="form-control  "
                       name="jehano" type="text"  id="jehano" >
                @error('jeha') <span class="error">{{ $message }}</span> @enderror
                @error('jeha_type') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div   class="col-md-8" >
            <label id="jehalabel" for="select2-dropdown" class="form-label-me">{{"$jeha_name"}}</label>
                @livewire('select2-dropdown')
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                <label  for="storeno" class="form-label-me">المخزن</label>
                <input  wire:model="st_no" wire:keydown.enter="$emit('gotonext','storeno')"
                       class="form-control  "
                       name="storeno" type="text"  id="storeno" >
                @error('st_no') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div  class="col-md-8" >
                <label  class="form-label-me">اختيار من القائمة</label>
                <select  wire:model="store" name="store_id" id="store_id" class="form-control  form-select "
                         style="vertical-align: middle ;font-size: 12px;height: 26px;padding-bottom:0;padding-top: 0;"
                         >
                    <option value="1">المخزن الرئيسي</option>
                    @foreach($stores_names as $s)
                        <option value="{{ $s->st_no }}">{{ $s->st_name }}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="col-md-auto"  >
                <br>
                <i  id="head-btn"
                    class=" btn btn-outline-success btn-rounded waves-effect waves-light fas fa-save adventuresome"
                    wire:click="BtnHeader"> موافق </i>
                <br>
                <br>
            </div>
    </div> <!-- End card-body -->
  </div>

    <div x-data x-show="$wire.OrderDataOpen">
        <div class="card col-md-auto " style="border:1px solid #9d9d9d;">

            <div class="row">
                <div class="col-md-auto">
                    <label   class="form-label-me ">رقم الفاتورة</label>
                    <input wire:model="order_no" type="text" class=" form-control "   readonly  >
                </div>
                <div class="col-md-auto">
                    <label  class="form-label-me">التاريخ</label>
                    <input wire:model="order_date" type="text"  class="form-control  "   readonly >
               </div>
            </div>
                <div class="col-md-auto">
                    <label  class="form-label-me">المورد</label>
                    <input wire:model="jeha_name"   class="form-control  " type="text"  readonly >
                </div>
                <div   class="col-md-auto" >
                    <label  class="form-label-me">المخزن</label>
                    <input wire:model="st_name"   class="form-control  " type="text"   readonly>
                    <br>
                </div>

        </div> <!-- End card-body -->
    </div>

</div>

@push('scripts')
    <script type="text/javascript">
        Livewire.on('jehachange',postid=>{

            $("#jehano").focus();
        })
        Livewire.on('mounthead',postid=>{

            $("#orderno").focus();
            $("#orderno").select();
        })


        Livewire.on('gotonext',postid=>  {

            if (postid=='orderno') {  $("#date").focus(); };
            if (postid=='date') {  $("#jehano").focus(); };
            if (postid=='jehano') {  $("#storeno").focus(); };

            if (postid=='store_id') {  $("#head-btn").active=true};
        })

    </script>
@endpush
