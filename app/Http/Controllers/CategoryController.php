<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //query raw
       $listdata =  DB::select(DB::raw('select *from categories'));
       //query builder
       $listdata =  DB::table('categories')->get();
       //eloquent
       $listdata = Category::all();

    //    return view('medicine.index',compact('listdata'));
       return view('category.index',compact('listdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create',compact('listdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->name=$request->get('name');
        $data->description = $request->get('description');
        $data->save();
        return redirect()->route('kategori_obat.index')->with('status','Category is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //db query
        $data = DB::table('categories')
        ->get();
        //eloquent
        $data = Category::get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
    public function showlist($idcategory)
    {
        $data = Category::find($idcategory);
        $namecategory = $data->name;
        $result = $data->medicines;
        if($result)
        {
            $totaldata = $result->count();
        } 
        else
        {
            $totaldata = 0;
        }
           
        return view('report.listmedicine',compact('idcategory','namecategory','result','totaldata'));
    
    }
    public function catHaveMed()
    {
        //jumlah kategori yang memiliki medicines
        //db query
        $data = DB::table('categories')
        ->join('medicines','categories.id','=','medicines.category_id')
        ->select(DB::raw('count(distinct(medicines.category_id))'))
        ->get();
         //db query
         $data = DB::table('categories')
         ->join('medicines','categories.id','=','medicines.category_id')
         ->distinct()
         ->count('medicines.category_id');
        //eloquent
        $data = Category::join('medicines','categories.id','=','medicines.category_id')
        ->distinct()
        ->count('medicines.category_id');  
    }
    public function catnothavemed()
    {
        //nama kategori yang tidak memiliki medicines
        //db query
        $data = DB::table('categories')
        ->whereNotIn('id',function($query)
        {
            $query->select(DB::raw('distinct(category_id)'))->from('medicines');
        })
        ->select('name')
        ->get();
        //eloquent
        $data = Category::whereNotIn('id',function($query)
        {
            $query->select(DB::raw('distinct(category_id)'))->from('medicines');
        })
        ->select('name')
        ->get();
    }
    public function avgpricefromcategory()
    {
        //tampilkan rata" setiap kategori obat jika tidak ada obat maka 0
        //db query
        $data = DB::table('categories')
        ->leftJoin('medicines','categories.id','=','medicines.category_id')
        ->groupBy('categories.id')
        ->select('categories.id',DB::raw('ifnull(avg(medicines.price),0)'))
        ->get();
        //eloquent
        $data = Category::leftJoin('medicines','categories.id','=','medicines.category_id')
        ->groupBy('categories.id')
        ->select('categories.id',DB::raw('ifnull(avg(medicines.price),0)'))
        ->get();
    }
    public function catOneMedicine()
    {
        //Tampilkan kategori obat yang memiliki 1 produk medicine saja
        $satuproduk = DB::select(DB::raw('SELECT category_id FROM medicines GROUP by category_id HAVING COUNT(id) =1 '));
        //db query
        $data = DB::table('categories')
        ->join('medicines','categories.id','=','medicines.category_id')
        ->groupBy('medicines.category_id')
        ->having(DB::raw('count(medicines.id)'),1)
        ->select('categories.id')
        ->get();
        //eloquent
        $data = Category::join('medicines','categories.id','=','medicines.category_id')
        ->groupBy('medicines.category_id')
        ->having(DB::raw('count(medicines.id)'),1)
        ->select('categories.id')
        ->get();
    }
    public function highPrice()
    {
        //Tampilkan kategori dan nama obat yang memiliki harga termahal
        //db query
        $data = DB::table('categories')
        ->join('medicines','categories.id','=','medicines.category_id')
        ->where('medicines.price',function($query){
            $query->select(DB::raw('max(price)'))->from('medicines');
        })
        ->select('categories.name','medicines.generic_name')
        ->get();
        //eloquent
        $data = Category::join('medicines','categories.id','=','medicines.category_id')
        ->where('medicines.price',function($query){
            $query->select(DB::raw('max(price)'))->from('medicines');
        })
        ->select('categories.name','medicines.generic_name')
        ->get();
    }
}
