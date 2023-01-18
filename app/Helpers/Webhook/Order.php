<?php

namespace App\Helpers\Webhook;

use App\Events\NewOrder;
use App\Helpers\Telegram;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Order
{
    public function create(Request $request, $order_id)
    {
        $order = \App\Models\Order::find($order_id);
        $order->status_id = 2;
        $order->save();
        event(new NewOrder($order));
        $telegram = App::make(Telegram::class);
        $message = (string)view('telegram.service_order', ['service' => Service::find($order->service_id)]);
        $telegram->editMessage($request->input('callback_query')['from']['id'], $message, $request->input('callback_query')['message']['message_id']);
    }
}
