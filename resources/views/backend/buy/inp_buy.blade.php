@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content" style="padding-top: 60px; padding-bottom: 12px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
             <div class="card" style="margin: 0">
               @livewire('buy.order-buy-head')

                 <div class="card-body "  id="data-div"
                      style="pointer-events: none;margin : 10px 0 10px 0px;padding: 0">
                   <form method="post" action="" >
                    @csrf
                   <div class="row font-size-12 " style="margin: 0">
                       @livewire('buy.order-buy-detail')
                       @livewire('buy.order-buy-table')
                   </div>
                   </form>
                 </div>
             </div>
            </div>
        </div>
    </div>
</div>



    @stack('scripts')
@endsection












