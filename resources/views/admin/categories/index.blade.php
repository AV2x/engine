@extends('admin.layouts.app')

@section('content')
    <div>
        <h1 class="display-6">Категории</h1>
    </div>
    <div>
        <a href="{{route('categories.create')}}" class="btn btn-outline-secondary" >Создать</a>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <tr>
             @forelse($categories as $key => $category)
                    <td>{{$key + 1}}</td>
                    <td>{{$category->name}}</td>

                    <td>
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{route('categories.edit', $category)}}" class="btn btn-primary">Ред.</a>
                            </div>
                            <div class="col-md-1">
                                <form action="{{route('categories.destroy', $category)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Вы уверены что хотите удалить эту категорию?')" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </td>
            </tr>
            @empty
                <tr>
                    <td>Нет категорий</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
