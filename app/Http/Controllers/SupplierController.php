<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::all();
        return view('supplier.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("supplier.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Supplier();
        $data->name=$request->get('name');
        $data->address = $request->get('address');
        $data->save();
        return redirect()->route('suppliers.index')->with('status','Supplier is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $data = $supplier;
        return view('supplier.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->name=$request->get('name');
        $supplier->address=$request->get('address');
        $supplier->save();
        return redirect()->route('suppliers.index')->with('status','Supplier data is changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        try{
            $supplier->delete();
            return redirect()->route('suppliers.index')->with('status','Data supplier berhasil dihapus');
        }catch(\PDOException $e){
            $msg = "data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";

            return redirect()->route('suppliers.index')->with('error',$msg);
        }
    }
    public function getEditForm(Request $request){
        $id = $request->get('id');
        $data = Supplier::find($id);
        return response()->json(array(
            'status'=>'Oke',
            'msg'=>view('supplier.getEditForm',compact('data'))->render()
        ),200);
    }
    public function getEditForm2(Request $request){
        $id = $request->get('id');
        $data = Supplier::find($id);
        return response()->json(array(
            'status'=>'Oke',
            'msg'=>view('supplier.getEditForm2',compact('data'))->render()
        ),200);
    }
    public function saveData(Request $request){
        $id = $request->get('id');
        $Supplier = Supplier::find($id);
        $Supplier->name= $request->get('name');
        $Supplier->address = $request->get('address');
        $Supplier->save();
        return response()->json(array(
            'status'=>'ok',
            'msg'=>'Supplier data update'
        ),200);
    }
    public function deleteData(Request $request){
        $this->authorize('delete-permission',$request);
        try{
            $id = $request->get('id');
            $Supplier = Supplier::find($id);
            $Supplier->delete();
            return response()->json(array(
                'status'=>'OK',
                'msg'=>'Supplier data delete'
            ),200);
        }catch(\PDOException $e){
            return response()->json(array(
                'status'=>'error',
                'msg'=>'supplier is not deleted. It may used by medicines'
            ),200);
        }

    }
}
