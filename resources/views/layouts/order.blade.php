<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Оформить предложение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('orders.store')}}" method="post">
                <div class="modal-body">
                    <a href="https://t.me/promethiumEngineBot?start=service_id={{$order_id ?? ''}}" target="_blank" class="btn btn-primary"><i class="fa fa-telegram" style="font-size: 23px" aria-hidden="true"></i> Телеграм (новое)</a>
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"><b>Введите ваше имя</b></label>
                        <input type="text" required name="name" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email</label>
                        <input type="email" name="email"  class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"><b>Телефон</b></label>
                        <input type="text" name="tel" required class="form-control" id="recipient-name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
