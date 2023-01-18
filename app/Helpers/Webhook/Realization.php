<?php

namespace App\Helpers\Webhook;

use App\Helpers\Telegram;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Realization
{
    public $path;
    protected $type;
    protected $telegram;

    public function __construct(Type $type, Telegram $telegram)
    {
        $this->type = $type;
        $this->telegram = $telegram;
        $path = new Path($type);
        $this->path = $path->realization();
    }

    public function sendService(Request $request)
    {
        $value = $this->type->getValue();
        $order = new Order();
        $order->name = $request->input('message')['from']['first_name'];
        $order->service_id = $value;
        if(isset($request->input('message')['from']['username'])){
            $order->telegram_username = $request->input('message')['from']['username'];
        }
        $order->telegram_id = $request->input('message')['from']['id'];
        $order->save();

        $service =  Service::find($value);
        $media = [];
        foreach ($service->images as $key => $image){
            if($key == 3) { break; }
            $media[] = ['type' => 'photo', 'media' => 'https://primeengine.ru/storage/images/services/origin/'.$image->filename];

        }
        $this->telegram->sendMediaGroup($request->input('message')['from']['id'], $media);
        $message = (string)view('telegram.service', ['service' => $service]);
        $buttons= [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Заказать',
                        'callback_data' => 'order_id='.$order->id
                    ],
//                    [
//                        'text' => 'После завтра',
//                        'callback_data' => 'order_id='.$order->id
//                    ],
                ],
//                [
//                    [
//                        'text' => 'Через 3 деня',
//                        'callback_data' => 'order_id='.$order->id
//                    ],
//                ]
            ]
        ];
        $this->telegram->sendButtons($request->input('message')['from']['id'], $message, $buttons);
    }

    public function newOrder(Request $request)
    {
        $order = new \App\Helpers\Webhook\Order();
        $order->create($request,$this->type->getValue());
    }

    public function answerMessage(Request $request)
    {
        $answer = new Answer();
        $answer->create($request, $this->telegram);
    }
    public function chatPost(Request $request)
    {
        $order = Order::where('message_channel_id', $request->input('message')['forward_from_message_id'])->first();

        $order->message_chat_id = $request->input('message')['message_id'];
        $order->save();
    }
    public function forwardToUser(Request $request)
    {
        $order = Order::where('message_chat_id', $request->input('message')['reply_to_message']['message_id'])->first();
        $media = [];
        if(isset($request->input('message')['photo'])){
                $media[] = ['type' => 'photo', 'media' => $request->input('message')['photo'][3]['file_id']];
            $this->telegram->sendMediaGroup($order->telegram_id, $media);
        }
        else{
            if(substr($request->input('message')['text'], 0, 1) == '?'){
                $message = trim(mb_substr($request->input('message')['text'], 1));
                $buttons= [
                    'inline_keyboard' => [
                        [
                            [
                                'text' => 'Подтвердить',
                                'callback_data' => 'signature='.$order->id.'=true'
                            ],
                            [
                                'text' => 'Отказаться',
                                'callback_data' => 'signature='.$order->id.'=false'
                            ]
                        ]
                    ]
                ];
                $this->telegram->sendButtons($order->telegram_id, $message, $buttons);
            }
            else{
                $this->telegram->sendMessage($order->telegram_id, $request->input('message')['text']);
            }

        }

    }

    public function signature(Request $request)
    {
        if($this->type->getType() == 'cancel'){
            return true;
        }
        $order_id = $this->type->getValue();
        $sign = $this->type->getSign();
        $order = Order::find($order_id);
        if($sign == 'true'){
            $message = "<b>$order->name</b> дал <b>согласие</b> на ваш запрос";
        }
        else{
            $message = "<b>$order->name</b> дал <b>отказ</b> на ваш запрос";
        }
        $this->telegram->replyMessage('-1001765252937', $message, $order->message_chat_id);
        $accept = ($sign == 'true') ? '✅Подтвердить' : 'Подтвердить';
        $cancel = ($sign == 'false') ? '✅Отказаться' : 'Отказаться';
        $buttons= [
            'inline_keyboard' => [
                [
                    [
                        'text' => $accept,
                        'callback_data' => 'cancel=true'
                    ],
                    [
                        'text' => $cancel,
                        'callback_data' => 'cancel=true'
                    ]
                ]
            ]
        ];

        $this->telegram->editButtons(
            $request->input('callback_query')['from']['id'],
            $request->input('callback_query')['message']['text'],
            $buttons,
            $request->input('callback_query')['message']['message_id'],
        );
    }

    public function geolocationUser(Request $request)
    {
        $order = \App\Models\Order::where('telegram_id', $request->input('message')['from']['id'])->orderBy('id', 'desc')->first();
//        $order->geolocation = substr($request->input('message')['text'], strpos($request->input('message')['text'], 'https'));
//        $order->save();
        $latitude = $request->input('message')['location']['latitude'];
        $longitude = $request->input('message')['location']['longitude'];
        $this->telegram->replyMessage('-1001765252937',
            '<a href="https://maps.google.com/maps?q='.$latitude.','.$longitude.'&ll='.$latitude.','.$longitude.'&z=16">Пользователь находится по здесь</a>',
            $order->message_chat_id
        );
        $buttons= [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Отправится',
                        'url' => 'https://maps.google.com/maps?q='.$latitude.','.$longitude.'&ll='.$latitude.','.$longitude.'&z=16'
                    ],
                ]
            ]
        ];
        $this->telegram->sendButtons('1958207276',
            'Новый заказ',
            $buttons
        );
        $this->telegram->sendButtons($request->input('message')['from']['id'], 'Ваше сообщение отправлено!', array(
            'remove_keyboard' => true
        ));
    }


    public function geolocationDeliver(Request $request)
    {
        $order = \App\Models\Order::where('telegram_id', 5431617179)->orderBy('id', 'desc')->first();

        $buttons= [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Завершить поездку',
                        'callback_data' => 'delivery='.$order->id
                    ],
                ]
            ]
        ];
        $this->telegram->sendButtons($request->input('message')['from']['id'],
            'Как доставите автомобиль, завершите поездку',
            $buttons
        );
        $buttons= [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Отслеживать курьера',
                        'url' => substr($request->input('message')['text'], strpos($request->input('message')['text'], 'https'))
                    ],
                ]
            ]
        ];
        $this->telegram->sendButtons($order->telegram_id,
            'Курьер выехал, вы можете его отслеживать',
            $buttons
        );

    }

    public function deliveryClose(Request $request)
    {
        Cache::forever('aasd', $this->type->getValue());
        $order_id = $this->type->getValue();
        $order = Order::find($order_id);
        $order->status_id = 6;
        $order->save();
        $this->telegram->editMessage($request->input('callback_query')['from']['id'],
            'Поездка завершена',
            $request->input('callback_query')['message']['message_id']
        );

        $this->telegram->sendMessage($order->telegram_id,
            'Курьер доставил автомобиль',
        );
        $this->telegram->replyMessage('-1001765252937',
            'Курьер доставил автомобиль',
            $order->message_chat_id
        );
    }
}
