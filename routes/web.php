<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::get('foo', function () {
    return "Hello world";
});

Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

Route::get('user/{name?}', function ($name = 'John') {
    return $name;
});

Route::get('greeting', function () {
    return view('welcome',['name'=>'samantha']);
});

Route::get('catalog', function () {
    return view('catalog',["title"=>'Catalog']);    
});

Route::get('catalog/medicines', function () {
    return view('medicines',[
        "nama"=>'Medicines'
    ]);
});

Route::get('catalog/med_equip', function () {
    return view('equipments',[
        "nama"=>'Medical Equipment'
    ]);
});

Route::get('medicines/{medicine_id}', function ($id) {
    return view('detailMedicine',["id"=>$id]);
});

Route::get('equipments/{equip_id}', function ($id) {
    return view('detailEquipments',["id"=>$id]);
});


// Route::get('formnewproduct', 'ProductController@create') ;
// Route::get('formupdateproduct', 'ProductController@update') ;

// Route::resource('product','ProductResController');
Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard','MedicineController@front_index');
    Route::get('cart','MedicineController@cart');
    Route::get('add-to-cart/{id}','MedicineController@addToCart');

    Route::resource('obat','MedicineController');
    Route::resource('kategori_obat','CategoryController');
    
    Route::get('/report/listmedicine/{id}','CategoryController@showlist')->name('reportShowMedicine');
    
    Route::get('index.html', function(){
    return view('index');
    });
    Route::get('obatModal/{id}','MedicineController@showModel')->name('showModel');
    
    Route::post('/obat/showInfo','MedicineController@showInfo')->name('showInfo');
    
    Route::post('/kategori_obat/showMedicines','CategoryController@showMedicines')->name('category.showMedicines');
    
    Route::get('transaction/show', 'TransactionController@index')->name('transaction');
    Route::post('transaction/showAjax','TransactionController@showAjax')->name('transaction.showAjax');
    
    Route::resource('suppliers','SupplierController');
    
    Route::post('/suppliers/getEditForm','SupplierController@getEditForm')->name('supplier.getEditForm');
    Route::post('/suppliers/getEditForm2','SupplierController@getEditForm2')->name('supplier.getEditForm2');
    Route::post('/suppliers/saveData','SupplierController@saveData')->name('supplier.saveData');
    Route::post('/suppliers/deleteData','SupplierController@deleteData')->name('supplier.deleteData');
    
    Route::post('/obat/getEditForm','MedicineController@getEditForm')->name('medicine.getEditForm');
    Route::post('/obat/getEditForm2','MedicineController@getEditForm2')->name('medicine.getEditForm2');
    Route::post('/obat/saveData','MedicineController@saveData')->name('medicine.saveData');
    Route::post('/obat/deleteData','MedicineController@deleteData')->name('medicine.deleteData');
    Route::post('/obat/saveDataField','MedicineController@saveDataField')->name('medicine.saveDataField');

    Route::get('/checkout','TransactionController@form_submit_front');
    Route::get('/submit_checkout','TransactionController@submit_front')->name('submitCheckout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
