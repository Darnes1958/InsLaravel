@php
    $id = Auth::user()->id;
    $admindata = App\Models\User::find($id);
@endphp


    <nav id="sidebar">



        <div class="p-4 pt-5">
            <h1><a href="#" class="logo"> </a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="#OrderBuy" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">مشتريات</a>
                    <ul class="collapse list-unstyled" id="OrderBuy">
                        <li>
                            <a href="{{route('order_buy')}}">فاتورة مشتريات</a>
                        </li>
                        <li>
                            <a href="{{route('customer.all')}}">استفسار عن فاتورة</a>
                        </li>
                        <li>
                            <a href="#">استفسار عن فواتير</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#OrderSell" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">مبيعات</a>
                    <ul class="collapse list-unstyled" id="OrderSell">
                        <li>
                            <a href="#">فاتورة مبيعات بالتقسيط</a>
                        </li>
                        <li>
                            <a href="#">فاتورة مبيعات نقداً</a>
                        </li>
                        <li>
                            <a href="#">استفسار عن فاتورة مبيعات</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#RepAksat" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">تقارير عن العقود</a>
                    <ul class="collapse list-unstyled" id="RepAksat">
                        <li>

                            <a href="{{route('pagi-rep_bank',0)}}">تقرير عن مصرف</a>
                        </li>
                        <li>
                            <a href="{{route('rep_banks.sum')}}">تقرير بإجمالي المصارف</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

        </div>
    </nav>



    <!-- Page Content  -->





