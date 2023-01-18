@extends('admin.layouts.app')

@section('content')
    <div>
        <h1 class="display-6">Пользователи</h1>
    </div>
    <div>
        <a href="{{route('users.create')}}" class="btn btn-outline-secondary" >Создать</a>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>№</th>
                <th>Аватар</th>
                <th>Имя Фамилия</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $key => $user)
                <tr>
                    <td>{{$key +1}}</td>
                    <th style="width: 10%">
                        <img style="width: 50%" src="{{asset('/storage/images/avatars/'.$user->avatar)}}" class="d-block rounded-circle">
                    </th>
                    <td>{{$user->name}}</td>
                    <td>
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{route('users.edit', $user)}}" class="btn btn-primary">Ред.</a>
                            </div>
                            <div class="col-md-1">
                                <form action="{{route('users.destroy', $user)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Вы уверены что хотите удалить этого пользователя?')" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Нет пользователей</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
