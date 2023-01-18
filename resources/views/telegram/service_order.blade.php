{{ strip_tags(str_replace('</p>', "\r\n", $service->description), '<a><i><b>') }}
<b>Цена:</b> <i>{{$service->price}} руб.</i>

<i>Спасибо за обращение, с вами скоро свяжутся!</i>
