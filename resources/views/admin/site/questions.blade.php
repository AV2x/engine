@extends('admin.layouts.app')

@section('content')
    @include('admin.site.tabs', ['active' => 'questions'])
    <div class="col-md-6" style="padding-top: 30px;">
        <h4>Редактирование Отзывов</h4>
        <hr>
        <div>
            <form action="/admin/questions/update" method="post" enctype="multipart/form-data">
                <div id="questions">

                    @csrf
                    @forelse($questions as $key => $question)

                        <div id="question_{{$key}}">
                            <input type="hidden" name="id[{{$key}}]" value="{{$question->id}}">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="name">Заголовок</span>
                                <input type="text" required value="{{$question->title}}" name="questions[{{$key}}][title]" placeholder="Почему так дешево?" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="name">Текст</span>
                                <textarea id="description_{{$key}}" name="questions[{{$key}}][text]" class="form-control" aria-label="Описание" style="height: 100px;">{{$question->description}}</textarea>
                            </div>
                            @if($key > 0)
                                <a class="btn btn-secondary" style="color:white;" onclick="removeQuestion({{$key}})">Удалить вопрос</a>
                            @endif
                            <hr>
                        </div>
                    @empty
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Заголовок</span>
                            <input type="text" required  name="questions[0][title]" placeholder="Почему так дешево?" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Текст</span>
                            <textarea id="description" name="questions[0][text]" class="form-control" aria-label="Описание" style="height: 100px;"></textarea>
                        </div>
                        <hr>
                    @endforelse
                </div>
                <div class="input-group mb-3">
                    <a style="color: white;" class="btn btn-success" onclick="addQuestion()">Добавить вопрос</a>
                </div>
                <hr>
                <div class="input-group mb-3">
                    <button class="btn btn-primary">Обновить</button>
                </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        var i =  {{count($questions)}};
        i++;
        function addQuestion()
        {
            let questions = document.getElementById('questions');
            var html = '<div id="question_'+i+'">'+
                '<div class="input-group mb-3">'+
                '<span class="input-group-text" id="name">Заголовок</span>'+
                '<input type="text" required  name="questions['+i+'][title]" placeholder="Почему так дешево?" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">'+
                '</div>'+
                '<div class="input-group mb-3">'+
                '<span class="input-group-text" id="name">Текст</span>'+
                '<textarea id="description_'+i+'" name="questions['+i+'][text]" class="form-control" aria-label="Описание" style="height: 100px;"></textarea>'+
                '</div>'+
                '<a class="btn btn-secondary" style="color:white;" onclick="removeQuestion('+i+')">Удалить вопрос</a>'+
                '<hr>'+
                '</div>';
            questions.insertAdjacentHTML('beforeend', html);
            i++;
        }
        function removeQuestion(id){
            document.getElementById('question_'+id).remove();
        }

    </script>
@endsection
