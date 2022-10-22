
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@livewire('buy.order-buy-add')


    <script>
        Livewire.on('orderenter', postId => {
            alert('A post was added with the id of: ' + postId);
        })
    </script>


    <script type="text/javascript">
        window.livewire.on('change-focus-other-field', function () {
            dd('test');
            $("#current_stock_qty").focus();
        });


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



    </script>







