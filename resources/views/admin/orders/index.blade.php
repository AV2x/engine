@extends('admin.layouts.app')

@section('content')
    <div>
        <h1 class="display-6">Заказы</h1>
    </div>
    <div>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Создать</button>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Услуга</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Тел.</th>
                    <th>Telegram</th>
                    <th>Цена</th>
                    <th>Статус</th>
                    <th>Время</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $key => $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->service->name ?? ''}}</td>
                        <td>{{$order->name}}</td>
                        <td>
                            <a href="mailto:{{$order->email}}" target="_blank">{{$order->email}}</a>
                        </td>
                        <td>
                            {{$order->tel}}
                        </td>
                        <td>
                            <a href="https://t.me/{{$order->telegram_username}}" target="_blank">{{$order->telegram_username}}</a>
                        </td>
                        <td>{{$order->service->price ?? ''}} руб</td>
                        <td>
                            <select class="form-select" id="inputGroupSelect01" onchange="changeStatus(this, {{$order->id}})">
                                @forelse($statuses as $status)
                                    <option value="{{$status->id}}" @if($order->status_id == $status->id) selected @endif>{{$status->name}}</option>
                                @empty
                                    <option value="" disabled>Нет статусов</option>
                                @endforelse
                            </select>
                        </td>
                        <td>
                            {{\App\Helpers\DateOrder::convert($order->created_at)}}
                        </td>
                        <td>
                            <div class="row-cols-2">
                                <div class="col-md-6">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_{{$order->id}}">Ред.</button>
                                    @include('admin.orders.modal', ['order' => $order])
                                </div>
                                <div class="col-md-6">
                                    <form action="{{route('orders.destroy', $order)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Вы уверены что хотите удалить этот заказ?')" class="btn btn-danger">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Нет заказов</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Создание заказа</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('orders.store')}}" method="post">
                <div class="modal-body">

                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Имя клиента</label>
                            <input type="text" required name="name" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="recipient-name">
                        </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Телефон</label>
                        <input type="text" name="tel" class="form-control" id="recipient-name">
                    </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Услуга</label>
                            <select class="form-select" name="service_id" id="inputGroupSelect01">
                                @forelse($services as $service)
                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                @empty
                                    <option value="" disabled>Нет услуг</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Telegram логин</label>
                            <input type="text" name="telegram_username" class="form-control" id="recipient-name">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="message-text" class="col-form-label">Message:</label>--}}
{{--                            <textarea class="form-control" id="message-text"></textarea>--}}
{{--                        </div>--}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function changeStatus(button, order_id)
        {
            let status_id = button.value;
            let time = '';
            if(status_id == 3)
            {
                time = prompt('Укажите время обработки');
            }
            else if(status_id == 2){
                time = confirm('Вы уверены что хотите переместить заказ в новый?');
            }
            else if(status_id == 5){
                time = confirm('Отправляем клиенту?');
            }
            else if(status_id == 4){
                time = confirm('Вы уверены что хотите закрыть заказ?');
            }
            if(time != null && time != false){
                let response =  fetch('/admin/api/status-change', {
                    method: 'POST',
                    headers: {
                        "X-CSRF-Token": '{{ csrf_token() }}',
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify({order_id: order_id, status_id: status_id, time: time})
                });
                return true;
            }
             return  false;
        }
    </script>
@endsection
