<b>Новый заказ №{{$order->id}}</b>
<b>Услуга: </b> {{$order->service->name}}
<b>Имя: </b> {{$order->name}}
@if($order->tel)
<b>Тел: </b> {{$order->tel}}
@endif
@if($order->telegram_username)
<b>Телеграм: </b> <a href="https://t.me/{{$order->telegram_username}}">{{$order->telegram_username}}</a>
@endif
