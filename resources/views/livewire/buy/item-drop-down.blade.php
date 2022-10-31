<div  wire:ignore class="col-md-auto" >

    <br>
    <select  class="form-control" id="item-drop-down" style="width: 400px" >
        <option value="2">مشتريات عامة</option>
        @foreach($select_name as $key => $item)
            <option value="{{ $item->item_no }}">{{ $item->item_name }}</option>
        @endforeach
    </select>
    <br><br>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {

            $('#item-drop-down').select2();
            $('#item-drop-down').on('change', function (e) {
                var data = $('#item-drop-down').select2("val");

            @this.set('select_no', data);

                Livewire.emit('itemchange', data);
            });
        });
    </script>
@endpush

