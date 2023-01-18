@extends('admin.layouts.app')

@section('content')
    @include('admin.site.tabs', ['active' => 'feedbacks'])
    <div class="col-md-6" style="padding-top: 30px;">
        <h4>Редактирование Отзывов</h4>
        <hr>
        <div>
            <form action="/admin/feedbacks/update" method="post" enctype="multipart/form-data">
                <div id="offices">

                    @csrf
                    @forelse($feedbacks as $key => $feedback)

                        <div id="feedback_{{$key}}">
                            <input type="hidden" name="id[{{$key}}]" value="{{$feedback->id}}">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="name">Имя Фамилия</span>
                                <input type="text" required value="{{$feedback->name}}" name="name[]" placeholder="Иванов Иван" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="name">Текст</span>
                                <textarea id="description" name="text[]" class="form-control" aria-label="Описание" style="height: 100px;">{{$feedback->text}}</textarea>
                            </div>
                            <h4>Аватар</h4>
                            <div class="input-group mb-3">
                                <div class="col-md-3">
                                    <img src="{{asset('/storage/images/avatars/'.$feedback->avatar)}}" class="w-100 rounded-circle" alt="">
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" name="avatar[]" class="form-control" id="inputGroupFile02">
                            </div>
                            @if($key > 0)
                                <a class="btn btn-secondary" style="color:white;" onclick="removeFeedback({{$key}})">Удалить отзыв</a>
                            @endif
                            <hr>
                        </div>
                    @empty
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Имя Фамилия</span>
                            <input type="text" required  name="name[]" placeholder="Иванов Иван" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Текст</span>
                            <textarea id="description" name="text[]" class="form-control" aria-label="Описание" style="height: 100px;"></textarea>
                        </div>
                        <h4>Аватар</h4>
                        <div class="input-group mb-3">
                            <input type="file" name="avatar[]" class="form-control" id="inputGroupFile02">
                        </div>
                        <hr>
                    @endforelse
                </div>
                <div class="input-group mb-3">
                    <a style="color: white;" class="btn btn-success" onclick="addFeedback()">Добавить отзыв</a>
                </div>
                <hr>
                <div class="input-group mb-3">
                    <button class="btn btn-primary">Обновить</button>
                </div>

            </form>
        </div>
    </div>

    <script>
        var i = {{count($feedbacks)}};
        function addFeedback()
        {
            let offices = document.getElementById('offices');
            var html = '<div id="feedback_'+i+'">'+
                '<div class="input-group mb-3">'+
                '<span class="input-group-text" id="name">Имя Фамилия</span>'+
                '<input type="text" required  name="name[]" placeholder="Иванов Иван" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">'+
                '</div>'+
                '<div class="input-group mb-3">'+
                '<span class="input-group-text" id="name">Текст</span>'+
                '<textarea id="description" name="text[]" class="form-control" aria-label="Описание" style="height: 100px;"></textarea>'+
                '</div>'+
                '<h4>Аватар</h4>'+
                '<div class="input-group mb-3">'+
                '<input type="file" name="avatar[]" class="form-control" id="inputGroupFile02">'+
                '</div>'+
                '<a class="btn btn-secondary" style="color:white;" onclick="removeOffice('+i+')">Удалить офис</a>'+
                '<hr>'+
                '</div>';
            offices.insertAdjacentHTML('beforeend', html);
            i++;
        }
        function removeFeedback(id){
            document.getElementById('feedback_'+id).remove();
        }

    </script>
@endsection
