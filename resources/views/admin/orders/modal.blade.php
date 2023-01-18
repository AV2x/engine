<div class="modal fade" id="exampleModal_{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Обновление заказа</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('orders.update', $order)}}" method="post">
                <div class="modal-body">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Имя клиента</label>
                        <input type="text" required name="name" value="{{$order->name}}" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email</label>
                        <input type="email" name="email" value="{{$order->email}}" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Телефон</label>
                        <input type="text" name="tel" value="{{$order->tel}}" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Услуга</label>
                        <select class="form-select" name="service_id" id="inputGroupSelect01">
                            @forelse($services as $service)
                                <option value="{{$service->id}}" @if($order->service_id == $service->id) selected @endif>{{$service->name}}</option>
                            @empty
                                <option value="" disabled>Нет услуг</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Telegram логин</label>
                        <input type="text" name="telegram_username" value="{{$order->telegram_username}}" class="form-control" id="recipient-name">
                    </div>
                    {{--                        <div class="form-group">--}}
                    {{--                            <label for="message-text" class="col-form-label">Message:</label>--}}
                    {{--                            <textarea class="form-control" id="message-text"></textarea>--}}
                    {{--                        </div>--}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
            </form>
        </div>
    </div>
</div>
