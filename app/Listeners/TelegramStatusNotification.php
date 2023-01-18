<?php

namespace App\Listeners;

use App\Events\StatusOrder;
use App\Helpers\Telegram;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TelegramStatusNotification
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
     * @param  \App\Events\StatusOrder  $event
     * @return void
     */
    public function handle(StatusOrder $event)
    {
        if($event->order->status_id == 5){
            $message = (string)view('telegram.orders.ready', ['order'=> $event->order]);
            $replyMarkup3 =[
                'keyboard' =>[ [ [
                    'text'=>'Отправить свое местоположение',
                    'request_location'=>true,
                    ]]],
                'resize_keyboard'=>true,
                'one_time_keyboard'=>true,
                ];
            $this->telegram->sendButtons($event->order->telegram_id, $message, $replyMarkup3);
        }
        else{
            $message = (string)view('telegram.orders.change_status', ['order'=> $event->order]);
            $this->telegram->sendMessage($event->order->telegram_id, $message);
            $message = (string)view('telegram.orders.edit_channel_message', ['order' => $event->order]);
            $message = $this->telegram->editMessage('-1001504687832', $message, $event->order->message_channel_id);
        }



    }
}
