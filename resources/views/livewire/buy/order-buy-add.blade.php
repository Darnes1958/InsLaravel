
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div>
                        <div class="card-body  font-size-12 "  id="head-div" style="pointer-events: all;border:1px solid black; " >

                            <div class="row" >
                                    <div class="col-md-2">
                                        <label  for="order_no" class="height22 col-md-6  form-label ">رقم الفاتورة</label>
                                        <input wire:keydown.enter="$emit('gotonext','orderno')" type="text" class="height26 form-control "
                                               id="order_no" name="order_no" value="{{$wid}}">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="date" class="height22 col-md-6 form-label">التاريخ</label>
                                        <input wire:keydown.enter="$emit('gotonext','date')" class="height26 form-control example-date-input" value="{{"$date"}}" name="date" type="date"  id="date" >
                                    </div>
                                    <div class="col-md-3">
                                        <label for="supplier_id" class=" height22 form-label">المورد</label>
                                        <select  wire:model="moh" name="supplier_id" id="supplier_id" class=" form-control form-select select2"
                                                aria-label="Default select example"  >
                                            <option value="2">مشتريات عامة</option>
                                            @foreach($jeha as $j)
                                                <option value="{{ $j->jeha_no }}">{{ $j->jeha_name }}</option>
                                            @endforeach
                                        </select>



                                    </div>


                                    <div class="col-md-3">
                                        <label for="example-text-input" class="height22 form-label">المخزن </label>
                                        <select  wire:model="store" name="store_id" id="store_id" class="form-control  form-select "
                                                  style=" vertical-align: middle ;font-size: 12px;height: 26px;padding-bottom:0;padding-top: 0;" >
                                            <option value="1">المخزن الرئيسي</option>
                                            @foreach($stores_names as $s)
                                                <option value="{{ $s->st_no }}">{{ $s->st_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-2">


                                        <i  id="head-btn" style="margin-top: 18px;"
                                            class=" btn btn-outline-success btn-rounded waves-effect waves-light fas fa-save adventuresome"> موافق </i>
                                    </div>

                            </div> <!-- // end row  -->
                        </div> <!-- End card-body -->
                    </div>


                    <div class="card-body "  id="data-div" style="pointer-events: none;">
                        <form method="post" action="" >

                            @csrf
                          <div class="row font-size-12 ">
                            <div class="card col-md-4 " style="border:1px solid black;">
                                <div class="form-group col-md-10 mb-2 ">
                                    <label class="height22"> الصنف  </label>
                                    <select name="customer_id" id="customer_id" class="form-select select2 ">
                                        <option value="">Select Customer </option>
                                        <option value="0">New Customer </option>
                                    </select>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="md-3 ">
                                        <label for="example-text-input" class="height22 form-label">الكمية</label>
                                        <input class="height26 form-control example-date-input" name="quant" type="text" value="1"
                                               id="quant"   >
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="md-3">
                                        <label for="example-text-input" class="height22 form-label">السعر</label>
                                        <input class="height26 form-control example-date-input" name="price" type="text" value=""
                                               id="price"   >
                                    </div>
                                </div>
                            </div> <!-- // end row --> <br>
                            <!-- Hide Add Customer Form -->
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
                          </div>
                        </form>
                    </div> <!-- End card-body -->

                </div>
            </div> <!-- end col -->
        </div>

    </div>



</div>

@push('scripts')


<script type="text/javascript">

        Livewire.on('gotonext',postid=>  {
            alert(postid);
          if (postid=='orderno') {  $("#date").focus()};
          if (postid=='mohupdate') { alert('here'); $("#store_id").attr("size","3"); };
          if (postid=='store_id') {  $("#current_stock_qty").focus()};
    })


    $(function () {
        $(document).on('click', '#head-btn', function (e) {
            e.preventDefault();
            document.getElementById("data-div").style.pointerEvents = "";
            document.getElementById("head-div").style.pointerEvents = "none";
            let the_store = document.getElementById("store_id").value;

            $.ajax({
                url:"{{ route('get-items-in-store') }}",
                type: "GET",
                data:{store_id:the_store},
                success:function(data){

                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.item_no+' "> '+v.storeitems.item_name+'</option>';
                    });
                    $('#customer_id').html(html);
                }
            })


        })
    });

        $(document).ready(function() {

            $('#select2').select2();

            $('#select2').on('change', function (e) {

                var data = $('#select2').select2("val");

            @this.set('moh', data);

            });
        });

</script>
@endpush







