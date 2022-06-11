<?php

namespace App\Http\Controllers;

use App\Category;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaction::all();
        return view('transaction.transaction',compact('data'));
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
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
    public function showAjax(Request $request)
    {
        $id = ($request->get('id'));
        $data = Transaction::find($id);
        $products = $data->medicines;
        return response()->json(array(
            'msg'=>view('transaction.showmodal',compact('data','products'))->render()
        ),200);
    }
    public function submit_front(){
        $this->authorize('checkmember');

        $card = session()->get('cart');
        $user = Auth::user();
        $t = new Transaction;
        $t->pembeli_id = $user->id;
        $t->transaction_date = Carbon::now()->toDateTimeString();
        $t->save();

        $totalharga = $t->insertMedicine($card,$user);
        $t->total = $totalharga;
        $t->save();

        session()->forget('cart');
        return redirect('/dashboard');
    }
    public function insertMedicine($cart,$user){
        $total = 0;
        foreach($cart as $id =>$detail){
            $total += $detail['price'] * $detail['quantity'];
            $this->medicine()->attach($id,['quantity'=>$detail['quantity'],'subtotal'=>$detail['price']]);
        }
        return $total;
    }
}
