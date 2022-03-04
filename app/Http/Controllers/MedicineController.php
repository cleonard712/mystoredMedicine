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
       $innershow = DB::select(DB::raw('select m.generic_name,m.form,m.restriction_formula, m.price, c.name, m.category_id,m.url from medicines as m inner join categories as c on m.category_id = c.id'));
    //    return view('medicine.index',compact('listdata'));
       return view('medicine.post',compact('innershow'));

       //query inner join
       $inner = DB::select(DB::raw('select m.generic_name,m.form,m.restriction_formula, c.name from medicines as m inner join categories as c on m.category_id = c.id'));

       //Tampilan jumlah kategori yang memiliki data medicines
       $jumlah = DB::select(DB::raw('select COUNT(DISTINCT category_id) from medicines'));
      // Tampilkan nama kategori yang tidak memiliki data medicines satupun
        $nomedicine = DB::select(DB::raw('select name from categories WHERE id NOT IN (SELECT DISTINCT category_id from medicines)'));
        //Tampilkan rata-rata harga setiap kategori obat. Bila tidak ada obat maka berikan 0
        $jumlah = DB::select(DB::raw(''));
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
