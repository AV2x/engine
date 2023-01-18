@extends('admin.layouts.app')

@section('content')
    @include('admin.site.tabs', ['active' => 'contacts'])
    <div class="col-md-6" style="padding-top: 30px;">
        <h4>Редактирование Контактов</h4>
        <hr>
        <div>
            <form action="/admin/contacts/update" method="post">
            <div id="offices">

                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="name">Ссылка на карту</span>
                        <input type="text" value="{{$contacts[0]->map}}" name="map" placeholder="" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                    </div>
                    @forelse($contacts as $key => $contact)
                    <div id="office_{{$key}}">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Офис</span>
                            <input type="text" required value="{{$contact->title}}" name="title[]" placeholder="Главный офис продаж" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Номер телефона</span>
                            <input type="tel" required value="{{$contact->tel}}" name="tel[]" placeholder="+7 (800) 600-68-93" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Адрес</span>
                            <input type="text" value="{{$contact->address}}" name="address[]" placeholder="наб. реки Карповки, 39, лит. Б, Санкт-Петербург" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Время работы в будни</span>
                            <input type="text" value="{{$contact->time_job_weekday}}" name="time_job_weekday[]" placeholder="10:00–20:00" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Время работы в выходные</span>
                            <input type="tel" value="{{$contact->time_job_weekend}}" name="time_job_weekend[]" placeholder="10:00–20:00" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        @if($key > 0)
                            <a class="btn btn-secondary" style="color:white;" onclick="removeOffice({{$key}})">Удалить офис</a>
                        @endif
                    <hr>
                    </div>
                    @empty
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Офис</span>
                            <input type="text" required name="title[]" placeholder="Главный офис продаж" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Номер телефона</span>
                            <input type="tel" required name="tel[]" placeholder="+7 (800) 600-68-93" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Адрес</span>
                            <input type="text" name="address[]" placeholder="наб. реки Карповки, 39, лит. Б, Санкт-Петербург" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Время работы в будни</span>
                            <input type="text" name="time_job_weekday[]" placeholder="10:00–20:00" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Время работы в выходные</span>
                            <input type="tel" name="time_job_weekend[]" placeholder="10:00–20:00" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                    @endforelse

            </div>
            <div class="input-group mb-3">
                <a style="color: white;" class="btn btn-success" onclick="addOffice()">Добавить офис</a>
            </div>
            <hr>
            <div class="input-group mb-3">
                <button class="btn btn-primary">Обновить</button>
            </div>
            </form>
        </div>
    </div>

    <script>
        var i = {{count($contacts)}};
        function addOffice()
        {
            let offices = document.getElementById('offices');
            var html = '<div id="office_'+i+'"><hr><div class="input-group mb-3">'+
                '<span class="input-group-text" id="name">Офис</span>'+
            '<input type="text" required name="title[]" placeholder="Главный офис продаж" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">'+
                ' </div>'+
                '<div class="input-group mb-3">'+
                '  <span class="input-group-text" id="name">Номер телефона</span>'+
                '   <input type="tel" required name="tel[]" placeholder="+7 (800) 600-68-93" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">'+
                ' </div>'+
                ' <div class="input-group mb-3">'+
                '   <span class="input-group-text" id="name">Адрес</span>'+
                ' <input type="text" name="address[]" placeholder="наб. реки Карповки, 39, лит. Б, Санкт-Петербург" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">'+
                '</div>'+
                '<div class="input-group mb-3">'+
                '  <span class="input-group-text" id="name">Время работы в будни</span>'+
                ' <input type="text" name="time_job_weekday[]" placeholder="10:00–20:00" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">'+
                ' </div>'+
                '<div class="input-group mb-3">'+
                '   <span class="input-group-text" id="name">Время работы в выходные</span>'+
                '  <input type="text" name="time_job_weekend[]" placeholder="10:00–20:00" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">'+
                '</div>' +
                '<div class="input-group mb-3">' +
                '<a class="btn btn-secondary" style="color:white;" onclick="removeOffice('+i+')">Удалить офис</a>' +
                '   </div></div>';
            offices.insertAdjacentHTML('beforeend', html);
            i++;
        }
        function removeOffice(id){
            document.getElementById('office_'+id).remove();
        }

    </script>
@endsection
