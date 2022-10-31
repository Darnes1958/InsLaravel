@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content" style="padding-top: 60px; padding-bottom: 12px;">
    <div class="container-fluid">
        <div class="row">
           @csrf
                    <div  class="col-md-4">
                       @livewire('buy.order-buy-head')
                       @livewire('buy.order-buy-detail')

                    </div>
                    <div class="col-md-8">
                       @livewire('buy.order-buy-table')
                    </div>


        </div>

    </div>

</div>

@stack('scripts')
@endsection












