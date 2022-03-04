<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //query raw
       $listdata =  DB::select(DB::raw('select * from medicines'));
       //query builder
       $listdata =  DB::table('medicines')->get();
       //eloquent
       $listdata = Medicine::all();
        // yang dapat nampilin kategori nama
       //$innershow = DB::select(DB::raw('select m.generic_name,m.form,m.restriction_formula, m.price, c.name, m.category_id,m.url from medicines as m inner join categories as c on m.category_id = c.id'));
    //    return view('medicine.index',compact('listdata'));
       return view('medicine.post',compact('listdata'));

       //query inner join
       $inner = DB::select(DB::raw('select m.generic_name,m.form,m.restriction_formula, c.name from medicines as m inner join categories as c on m.category_id = c.id'));

       //Tampilan jumlah kategori yang memiliki data medicines
       $jumlah = DB::select(DB::raw('select COUNT(DISTINCT category_id) from medicines'));
      // Tampilkan nama kategori yang tidak memiliki data medicines satupun
        $nomedicine = DB::select(DB::raw('select name from categories WHERE id NOT IN (SELECT DISTINCT category_id from medicines)'));
        //Tampilkan rata-rata harga setiap kategori obat. Bila tidak ada obat maka berikan 0
        $jumlah = DB::select(DB::raw('SELECT c.id, IFNULL( AVG(m.price),0) FROM categories as c LEFT JOIN medicines as m ON c.id = m.category_id GROUP by c.id'));
        //Tampilkan kategori obat yang memiliki 1 produk medicine saja
        $satuproduk = DB::select(DB::raw('SELECT category_id FROM medicines GROUP by category_id HAVING COUNT(id) =1 '));
        //Tampilkan obat yang memiliki satu form
        $form = DB::select(DB::raw('SELECT generic_name FROM medicines GROUP by generic_name HAVING COUNT(form) =1 '));
        //Tampilkan kategori dan nama obat yang memiliki harga termahal
        $max = DB::select(DB::raw('SELECT c.name, m.generic_name from categories as c INNER JOIN medicines as m on c.id = m.category_id WHERE m.price = (SELECT MAX(price) FROM medicines)'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
}
