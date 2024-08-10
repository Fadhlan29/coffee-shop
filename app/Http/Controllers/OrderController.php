<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('orders')
            ->orderBy('orders.id', 'desc')
            ->leftJoin('users', 'admin_id', '=', 'users.id')
            ->get();
        return view('orders.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Product::all();
        return view('orders.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required',
        ], [
            'customer.required' => 'Customer Name must be filled in',
        ]);

        $order = new Order();
        $order->fill([
            'admin_id' => Auth::user()->id,
            'customer' => $request->customer,
            'discount' => $request->discount,
            'total_price' => $request->total_price,
            'status' => 'Paid',
            'payment' => $request->payment,
        ]);
        $order->save();
        $no_list = 0;
        foreach ($request->id as $id) {
            $order_detail = new OrderDetail();
            $order_detail->fill([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $request->qty[$no_list]
            ]);
            $order_detail->save();
            $no_list++;
        }

        Alert::success('Success', 'Order data is success');
        return redirect('order');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
