{{--{!! strip_tags($service->description, '<a><i><b>') !!}--}}
{{ strip_tags(str_replace('</p>', "\r\n", $service->description), '<a><i><b>') }}
<b>Цена:</b> <i>{{$service->price}} руб.</i>

<code>Выберите свободное время.</code>
