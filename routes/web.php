<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\jeha\customercontroller;
use App\Http\Controllers\bank\BankReportsController;
use App\Http\Controllers\buy\OrderBuyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',function () {    return view('admin.index');});

Route::controller(AdminController::class)->group(function (){
    route::get('/admin/logout', 'destroy')->name('admin.logout') ;
    route::get('/admin/profile', 'Profile')->name('admin.profile') ;
    route::get('/edit/profile', 'EditProfile')->name('edit.profile') ;
    route::post('/store/profile', 'StoreProfile')->name('store.profile') ;
});

Route::controller(CustomerController::class)->group(function (){
    route::get('/customer/all', 'CustomerAll')->name('customer.all') ;
    route::get('/customer/add', 'CustomerAdd')->name('customer.add') ;
    route::post('/customer/store', 'CustomerStore')->name('customer.store') ;
    route::get('/customer/edit/{jeha_no}', 'CustomerEdit')->name('customer.edit') ;
    route::post('/customer/update', 'CustomerUpdate')->name('customer.update') ;
    route::get('/customer/delete{jeha_no}', 'CustomerDelete')->name('customer.delete') ;
    route::get('/search_customerall','SearchCustomerall')->name('search-customerall');

});
Route::controller(BankReportsController::class)->group(function (){

    route::get('/rep_banks/sum', 'Rep_Banks')->name('rep_banks.sum') ;
    route::get('/pagi_rep_bank/{bankno}','PagiRepBank')->name('pagi-rep_bank');
    route::get('/search_rep_bank','SearchRepBank')->name('search-rep_bank');


});

Route::controller(OrderBuyController::class)->group(function (){

    route::get('order_buy',  App\Http\Livewire\buy\OrderBuyAdd::class)->name('order_buy') ;
    route::get('/get-items-in-store','GetItemsInStore')->name('get-items-in-store');
    route::get('/order_buy/add','OrderBuy')->name('order_buy.add');

});



