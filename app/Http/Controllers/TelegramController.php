<?php

namespace App\Http\Controllers;

use App\Helpers\Telegram;
use App\Helpers\Webhook\Realization;
use App\Helpers\Webhook\Type;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    public $telegram;

    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }

    public function weebhook(Request $request)
    {
//        $this->telegram->sendButtons('1958207276', 'Спасибо', array(
//            'remove_keyboard' => true
//        ));
        Cache::forget('dop');
        Cache::forget('testa');
        if($request->input('edited_message')){
            return  true;
        }
        //return  true;
       // Cache::forget('dop');
        Cache::forever('testa', $request->all());
        try {
            $type = new Type($request);
            $realization = new Realization($type, $this->telegram);
            $path = $realization->path;
            $realization->$path($request);
        }
        catch (\Exception $exception){
            Cache::forever('testa', $exception);
           // Cache::forever('test', $request->all());
        }
        return true;
    }
    public function test()
    {
        $this->telegram->sendMessage('-1001504687832', 'test');
    }
}
