<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram {

    protected $http;
    protected $bot;
    const url = 'https://api.tlgr.org/bot';

    public function __construct(Http $http, $bot)
    {
        $this->http = $http;
        $this->bot = $bot;
    }

    public function sendMessage($chat_id, $message){
        return  $this->http::post(self::url.$this->bot.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'disable_web_page_preview' => true,
        ]);
    }
    public function replyMessage($chat_id, $message, $message_id){
        return  $this->http::post(self::url.$this->bot.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_to_message_id' => $message_id
        ]);
    }


    public function editMessage($chat_id, $message, $message_id){
        return  $this->http::post(self::url.$this->bot.'/editMessageText', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'message_id' => $message_id
        ]);
    }

    public function sendDocument($chat_id, $file, $reply_id = null){
        return  $this->http::attach('document', Storage::get('/public/storage/images/'.$file), 'document.png')
            ->post(self::url.$this->bot.'/sendDocument', [
                'chat_id' => $chat_id,
                'reply_to_message_id' => $reply_id
            ]);
    }
    public function sendMediaGroup($chat_id, $media, $reply_id = null){
        return  $this->http::post(self::url.$this->bot.'/sendMediaGroup', [
                'chat_id' => $chat_id,
                'media' => $media,
                'reply_to_message_id' => $reply_id
            ]);
    }

    public function sendButtons($chat_id, $message, $button){
        return  $this->http::post(self::url.$this->bot.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'disable_web_page_preview' => true,
            'reply_markup' => $button
        ]);
    }

    public function editButtons($chat_id, $message, $button, $message_id){
        return  $this->http::post(self::url.$this->bot.'/editMessageText', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'reply_markup' => $button,
            'message_id' => $message_id,
        ]);
    }

    public function sendInvoice($chat_id, $title, $description, $prices){
        return  $this->http::post(self::url.$this->bot.'/sendInvoice', [
            'chat_id' => $chat_id,
            'title' => $title,
            'description' => $description,
            'currency' => 'RUB',
            'prices' => [
                ['label' => '1 сутки', 'amount' => $prices],
//                ['label' => '2 сутки', 'amount' => $prices + 400000],
//                ['label' => '3 сутки', 'amount' => $prices + 800000],
//                ['label' => '4 сутки', 'amount' => $prices + 1200000]
            ],
            'payload' => uniqid(),
            'provider_token' => '381764678:TEST:41907'
        ]);
    }
    public function sendLocation($chat_id, $message = 'Выберите локацию', $button){
        return  $this->http::post(self::url.$this->bot.'/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html',
            'disable_web_page_preview' => true,
            'reply_markup' => $button
        ]);
    }
}
