<?php

namespace App\Modules\PaymentMethod\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\PaymentMethod\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_methods = PaymentMethod::select('payment_method', ['payment_method_id', 'payment_method_name'], ['is_deleted'=>2]);
        return view("PaymentMethod::index", ['payment_methods'=>$payment_methods]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("PaymentMethod::create");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(['payment_method_name' => 'required',]);
        $payment_method_name =  request()->input('payment_method_name');
        PaymentMethod::insert('payment_method', ['payment_method_name' => $payment_method_name]);
        return redirect()->route('payment_method.index')->with('success', 'New Payment Method Created Successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment_methods = PaymentMethod::select('payment_method', ['payment_method_name'], ['is_deleted'=>2,'payment_method_id'=>$id]);
        return view('PaymentMethod::show', ['payment_methods'=>$payment_methods]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment_methods = PaymentMethod::select('payment_method', [
            'payment_method_id','payment_method_name'], ['is_deleted'=>2,'payment_method_id'=>$id]);
        return view('PaymentMethod::edit', ['payment_methods'=>$payment_methods]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(['payment_method_name' => 'required',]);
        $payment_method_name =  request()->input('payment_method_name');
        PaymentMethod::update('payment_method', ['payment_method_name' => $payment_method_name ], ['payment_method_id'=>$id]);
        return redirect()->route('payment_method.index')->with('success', 'Payment method updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentMethod::update('payment_method', ['is_deleted' => 1 ], ['payment_method_id'=>$id]);

        return redirect()->route('payment_method.index')->with('success', 'payment method deleted successfully.');
    }
}
