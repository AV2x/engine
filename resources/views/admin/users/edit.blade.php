@extends('admin.layouts.app')

@section('content')
    <div>
        <h1 class="display-6">Обновление пользователя пользователя</h1>
    </div>
    <hr>
    <div class="col-md-6">

        <form action="{{route('users.update', $user)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text" id="name">Имя Фамилия</span>
                <input type="text" value="{{$user->name}}" required name="name" placeholder="Иванов Иван" class="form-control">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="email">Email</span>
                <input type="email" name="email" value="{{$user->email}}" required placeholder="example@gmail.com" class="form-control">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="name">Пароль</span>
                <input type="password" name="password" placeholder="Если пароль менять не нужно, то оставляйте пустым" class="form-control">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Права</label>
                <select class="form-select" name="roles[]" id="inputGroupSelect01" multiple>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}"
                       @foreach($user->roles as $userRole)
                           @if($userRole->id == $role->id)
                           selected
                               @endif
                           @endforeach
                        >{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <h4>Аватар</h4>
            <div class="input-group mb-3">
                <div class="col-md-3">
                    <img src="{{asset('/storage/images/avatars/'.$user->avatar)}}" class="w-100 rounded-circle" alt="">
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="file" name="avatar" class="form-control" id="inputGroupFile02">
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-primary">Обновить</button>
            </div>
        </form>
    </div>
@endsection
