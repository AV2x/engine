<?php

namespace App\Http\Controllers;

use App\Events\NewOrder;
use App\Events\StatusOrder;
use App\Helpers\Telegram;
use App\Models\Order;
use App\Models\Service;
use App\Models\Status;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Telegram $telegram)
    {
        return view('admin.orders.index', ['orders' => Order::orderBy('id', 'desc')->get(), 'statuses' => Status::get(), 'services' => Service::get()]);
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
        $this->order->name = $request->input('name');
        $this->order->email = $request->input('email');
        $this->order->telegram_username = $request->input('telegram_username');
        $this->order->service_id = $request->input('service_id');
        $this->order->tel = $request->input('tel');
        $this->status_id = 2;
        $this->order->save();
        event(new NewOrder($this->order));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->telegram_username = $request->input('telegram_username');
        $order->service_id = $request->input('service_id');
        $order->tel = $request->input('tel');
        $order->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return back();
    }

    public function changeStatus(Request $request)
    {
        $order = Order::find($request->input('order_id'));
        $order->status_id = $request->input('status_id');
        $order->time = $request->input('time');
        $order->save();
        event(new StatusOrder($order));
    }
}
