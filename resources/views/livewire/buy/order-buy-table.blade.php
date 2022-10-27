<div class="card col-md-8">
    <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;" id="orderlist">
        <thead>
        <tr>
            <th width="18%">رقم الصنف</th>
            <th>اسم الصنف </th>
            <th width="10%">الكمية</th>
            <th width="15%">السعر </th>
            <th width="15%">المجموع</th>
            <th width="7%">Action</th>
        </tr>
        </thead>
        <tbody id="addRow" class="addRow">

        </tbody>
        <tbody>
        <tr>
            <td colspan="4"> Discount</td>
            <td>
                <input type="text" name="discount_amount" id="discount_amount" class="form-control estimated_amount" placeholder="Discount Amount"  >
            </td>
        </tr>
        <tr>
            <td colspan="4"> Grand Total</td>
            <td>
                <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount" readonly style="background-color: #ddd;" >
            </td>
            <td></td>
        </tr>
        </tbody>
    </table><br>


    <div class="form-row">
        <div class="form-group col-md-12">
            <textarea name="description" class="form-control" id="description" placeholder="ملاحظات"></textarea>
        </div>
    </div><br>
    <div class="row new_customer" style="display:none">
        <div class="form-group col-md-4">
            <input type="text" name="name" id="name" class="form-control" placeholder="Write Customer Name">
        </div>
        <div class="form-group col-md-4">
            <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Write Customer Mobile No">
        </div>
        <div class="form-group col-md-4">
            <input type="email" name="email" id="email" class="form-control" placeholder="Write Customer Email">
        </div>
    </div>
    <!-- End Hide Add Customer Form -->
    <br>
    <div class="form-group">
        <button class="btn btn-info" id="storeButton">save</button>

    </div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
@push('scripts')
    <script type="text/javascript">


        Livewire.on('PushData',data=>  {
alert('PushData');
            var table = document.getElementById("orderlist").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.length);
            cell1 = newRow.insertCell(0);
            cell1.innerHTML = data.item_no;
            cell2 = newRow.insertCell(1);
            cell2.innerHTML = data.item_name;
            cell3 = newRow.insertCell(2);
            cell3.innerHTML = data.quant;
            cell4 = newRow.insertCell(3);
            cell4.innerHTML = data.price;
            cell5 = newRow.insertCell(4);
            cell5.innerHTML = data.price;

            cell6 = newRow.insertCell(5);
            cell6.innerHTML = `<a onClick="onEdit(this)">Edit</a>
                       <a onClick="onDelete(this)">Delete</a>`;
        });



    </script>
@endpush

