<?php

namespace App\Http\Controllers;

use App\Category;
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
       $data = Category::all();
        // yang dapat nampilin kategori nama
       //$innershow = DB::select(DB::raw('select m.generic_name,m.form,m.restriction_formula, m.price, c.name, m.category_id,m.url from medicines as m inner join categories as c on m.category_id = c.id'));
    //    return view('medicine.index',compact('listdata'));
  
       return view('medicine.index',compact('listdata','data'));

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
        $data = Category::all();
        return view('medicine.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Medicine();
        $data->generic_name=$request->get('generic_name');
        $data->form = $request->get('form');
        $data->restriction_formula = $request->get('restriction_formula');
        $data->price = $request->get('price');
        $data->description = $request->get('description');
        $data->faskes1 = $request->get('faskes1');
        $data->faskes2 = $request->get('faskes2');
        $data->faskes3 = $request->get('faskes3');
        $data->category_id = $request->get('category_id');

        $file = $request->file('logo');
        $imgFolder = 'img';
        $imgFile = time()."_".$file->getClientOriginalName();
        $file->move($imgFolder,$imgFile);
        $data->logo=$imgFile;

        $data->save();
        return redirect()->route('obat.index')->with('status','Medicine is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show( $medicine)
    {
        $res = Medicine::find($medicine);
        // dd($res);
        $data = "";
        if($res){
            $data = $res;
        }
        else
        {
            $data = null;
        }
        return view('medicine.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = Medicine::find($id);
        $listdata = Category::all();
        return view('medicine.edit',compact('data','listdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $medicine= Medicine::find($id);
        $medicine->generic_name = $request->get('generic_name');
        $medicine->form = $request->get('form');
        $medicine->restriction_formula = $request->get('restriction_formula');
        $medicine->price = $request->get('price');
        $medicine->description = $request->get('description');
        $medicine->faskes1 = $request->get('faskes1');
        $medicine->faskes2 = $request->get('faskes2');
        $medicine->faskes3 = $request->get('faskes3');
        $medicine->category_id = $request->get('category_id');
        $medicine->save();
        return redirect()->route('obat.index')->with('status','medicine data is changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try{
            $medicine = Medicine::find($id);
            $medicine->delete();
            return redirect()->route('obat.index')->with('status','Data medicine berhasil dihapus');
        }catch(\PDOException $e){
            $msg = "data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";

            return redirect()->route('obat.index')->with('error',$msg);
        }
    }
    public function query1(){
        //show name, formula, price dari medicine
        //db query
        $data = DB::table('medicines')
        ->select('generic_name','form','price')
        ->get();
        //eloquent
        $data = Medicine::select('generic_name','form','price')->get();
    }
    public function inner(){
        //inner join
        //db query
        $data = DB::table('medicines')
        ->join('categories','medicines.category_id','=','categories.id')
        ->select('medicines.generic_name','medicines.form','categories.name')
        ->get();
        //eloquent
        $data = Medicine::join('categories','medicines.category_id','=','categories.id')
        ->select('medicines.generic_name','medicines.form','categories.name')
        ->get();
    }
    public function oneform(){
        //Tampilkan obat yang memiliki satu form

        //db query
        $data = DB::table('medicines')
        ->groupBy('generic_name')
        ->having(DB::raw('count(form)'),1)
        ->select('generic_name')
        ->get();
        //eloquent
        $data = Medicine::groupBy('generic_name')
        ->having(DB::raw('count(form)'),1)
        ->select('generic_name')
        ->get();
    }
    public function showModel( $medicine)
    {
        $res = Medicine::find($medicine);
        // dd($res);
        $data = "";
        if($res){
            $data = $res;
        }
        else
        {
            $data = null;
        }
        return view('medicine.show3',compact('data'));
    }
    public function showInfo(){
    $result=Medicine::orderBy('price','DESC')->first();
    return response()->json(array('status'=>'oke','msg'=>"<div class='alert alert-info'>Did you know? <br>The most expensive product is ". $result->generic_name . "</div>"),200);
    }
    public function showMedicines()
    {
        $cat=Category::find($_POST['category_id']);
        $nama=$cat->name;
        $data=$cat->Medicines;
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('category.showMedicines',compact('nama','data'))->render()
        ),200);
    }
    public function getEditForm(Request $request){
        $id = $request->get('id');
        $data = Medicine::find($id);
        $listdata = Category::all();
        return response()->json(array(
            'status'=>'Oke',
            'msg'=>view('medicine.getEditForm',compact('data','listdata'))->render()
        ),200);
    }
    public function getEditForm2(Request $request){
        $id = $request->get('id');
        $data = Medicine::find($id);
        $listdata = Category::all();
        return response()->json(array(
            'status'=>'Oke',
            'msg'=>view('medicine.getEditForm2',compact('data','listdata'))->render()
        ),200);
    }
    public function saveData(Request $request){
        $id = $request->get('id');
        $medicine = Medicine::find($id);
        $medicine->generic_name= $request->get('generic_name');
        $medicine->form = $request->get('form');
        $medicine->restriction_formula = $request->get('restriction_formula');
        $medicine->price = $request->get('price');
        $medicine->description = $request->get('description');
        $medicine->category_id = $request->get('category_id');
        $medicine->faskes1 = $request->get('faskes1');
        $medicine->faskes2 = $request->get('faskes2');
        $medicine->faskes3 = $request->get('faskes3');
        $medicine->save();
        return response()->json(array(
            'status'=>'ok',
            'msg'=>'medicine data update'
        ),200);
    }
    public function deleteData(Request $request){
        try{
            $id = $request->get('id');
            $medicine = Medicine::find($id);
            $medicine->delete();
            return response()->json(array(
                'status'=>'OK',
                'msg'=>'medicine data delete'
            ),200);
        }catch(\PDOException $e){
            return response()->json(array(
                'status'=>'error',
                'msg'=>'medicine is not deleted. It may used by medicines'
            ),200);
        }

    }

    public function front_index(){
        $medicine = Medicine::all();
        return view('frontend.product',compact('medicine'));
    }

    public function addToCart($id){
        $m = Medicine::find($id);
        $cart = session()->get('cart');
        if(!isset($cart[$id])){
            $cart[$id]=[
                "name"=>$m->generic_name,
                "quantity"=>1,
                "price"=>$m->price,
            ];
        }
        else{
            $cart[$id]['quantity']++;
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product added to cart');
    }
    public function cart(){
        return view('frontend.cart');
    }
    public function saveDataField(Request $request){
        $id = $request->get('id');
        $generic =  $request->get('generic_name');
        $value = $request->get('value');
        $medicine = Medicine::find($id);
        $medicine->$generic = $value;
        // dd($medicine);
        $medicine->save();
        return response()->json(array(
            'status'=>'ok',
            'msg'=>'medicine data update'
        ),200);
    }
}