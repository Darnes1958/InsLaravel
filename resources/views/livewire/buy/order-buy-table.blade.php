<div class="card col-md-8">
    <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
        <thead>
        <tr>
            <th>رقم الصنف</th>
            <th>اسم الصنف </th>
            <th width="7%">الكمية</th>
            <th width="10%">السعر </th>
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
        <button type="submit" class="btn btn-info" id="storeButton"> Invoice Store</button>

    </div>
</div>
