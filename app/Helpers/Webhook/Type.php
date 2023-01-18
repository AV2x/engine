<?php

namespace App\Helpers\Webhook;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class Type
{
    protected $request;
    protected $text;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function requestExplode()
    {
        if(isset($this->request->input('message')['sender_chat']) && $this->request->input('message')['sender_chat']['id'] == '-1001765252937'){
            $this->text='forwardToUser='.$this->request->input('message')['message_id'];
            Cache::forever('type', '1');
        }
        elseif(isset($this->request->input('message')['location'])){
            $this->text='geolocationUser='.$this->request->input('message')['message_id'];
            Cache::forever('type', '3');
        }
        elseif(isset($this->request->input('message')['reply_to_message']) && isset($this->request->input('message')['text']) && strpos($this->request->input('message')['text'], 'https://maps.app.goo')){
            $this->text='geolocationDeliver='.$this->request->input('message')['message_id'];
            Cache::forever('type', '2');
        }
        elseif(isset($this->request->input('message')['reply_to_message'])){
            $this->text='forward='.$this->request->input('message')['reply_to_message']['message_id'];
            Cache::forever('type', '4');
        }
        elseif(isset($this->request->input('message')['forward_from_chat']) && $this->request->input('message')['sender_chat']['id'] == '-1001504687832'){
           // Cache::forever('testq', $this->request->all());
            Cache::forever('dop', 'da');
            $this->text='chatPost='.$this->request->input('message')['message_id'];
            Cache::forever('type', '5');
        }
        elseif(isset($this->request->input('message')['text'])){
            $this->text = explode(' ', $this->request->input('message')['text'])[1];
            Cache::forever('type', '6');
        }
        elseif(isset($this->request->input('callback_query')['data'])){
            Cache::forever('type', '7');
            $this->text = $this->request->input('callback_query')['data'];
        }
    }

    public function getType()
    {
        $this->requestExplode();
        return explode('=', $this->text)[0];
    }
    public function getValue()
    {
        $this->requestExplode();
        return explode('=', $this->text)[1];
    }
    public function getSign()
    {
        $this->requestExplode();
        return explode('=', $this->text)[2];
    }
}
