<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Helpers\Telegram;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TelegramOrderNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public $telegram;
    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewOrder  $event
     * @return void
     */
    public function handle(NewOrder $event)
    {
        $message = (string)view('telegram.orders.new', ['order'=> $event->order]);
        $message = $this->telegram->sendMessage('-1001504687832', $message);
        $result = json_decode($message->body());
        $event->order->message_channel_id = $result->result->message_id;
        $event->order->save();
    }
}
