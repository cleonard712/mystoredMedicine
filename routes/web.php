<?php

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

Route::resource('obat','MedicineController');
Route::resource('kategori_obat','CategoryController');