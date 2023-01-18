@extends('admin.layouts.app')

@section('content')
    <div>
        <h1 class="display-6">Техподдержка</h1>
    </div>
    <div>
        <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#createTask">Создать заявку</button>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th style="width: 15%;">Номер заявки</th>
                <th>Текст</th>
                <th>Время и дата</th>
            </tr>
            </thead>
            @foreach($tasks as $task)

                <tr onclick="alert('asd')">
                    <td>{{$task->id}}</td>
                    <td>{{$task->text}}</td>
                    <td>{{date('H:i d.m', strtotime($task->created_at))}}</td>
                </tr>

            @endforeach
        </table>
    </div>
    <div class="modal fade" id="createTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Обновление заявки</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('tasks.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Тип заявки</label>
                            <select class="form-select" name="type_id" id="inputGroupSelect01">
                                <option value="1" >Разработка</option>
                                <option value="2" >Проблема</option>
                            </select>
                        </div>
                        <div class="form-group" style="height: 150px;">
                            <label for="recipient-name" class="col-form-label">Имя клиента</label>
                            <textarea type="text" required name="text" style="height: 150px !important;" class="form-control" id="recipient-name"></textarea>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary">Оставить заявку</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
