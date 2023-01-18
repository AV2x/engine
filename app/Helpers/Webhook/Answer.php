<?php

namespace App\Helpers\Webhook;

use App\Helpers\Telegram;
use Illuminate\Http\Request;

class Answer
{
    public function create(Request $request, Telegram $telegram)
    {
        $order = \App\Models\Order::where('telegram_id', $request->input('message')['from']['id'])->orderBy('id', 'desc')->first();
        $message = (string)view('telegram.orders.user_answer', [
            'message' => $request->input('message')['text'],
            'user' => $order->name
        ]);
        $telegram->replyMessage('-1001765252937',
            $message,
            $order->message_chat_id
        );

        $telegram->sendMessage($request->input('message')['from']['id'],
            'Ваше сообщение отправлено!'
        );
    }
}
