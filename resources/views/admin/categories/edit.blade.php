@extends('admin.layouts.app')

@section('content')
    <div>
        <h1 class="display-6">Создание категории</h1>
    </div>
    <hr>
    <div class="col-md-6">
        @if($errors->messages())
            @foreach($errors->messages() as $message)
                @foreach($message as $value)
                    <div class="alert alert-danger">{{ $value }}</div>
                @endforeach
            @endforeach
        @endif
        <form action="{{route('categories.update', $category)}}" method="post">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text" id="name">Название</span>
                <input type="text" value="{{$category->name}}" required name="name" placeholder="Категория 1" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Главная категория</label>
                <select class="form-select" id="inputGroupSelect01" name="parent_id">
                    @forelse($categories as $categoryA)
                        @if($categoryA->id != $category->id)
                        <option value="{{$categoryA->id}}" >{{$categoryA->name}}</option>
                        @endif
                    @if($categoryA->categories)
                        @foreach($categoryA->categories as $parentCategory)
                               @if($parentCategory->id != $category->id)
                                <option value="{{$parentCategory->id}}">-{{$parentCategory->name}}</option>
                               @endif
                        @endforeach
                    @endif
                    @empty
                        <option value="">Категорий нет, сначала создайте категорию</option>
                    @endforelse
                </select>
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-primary">Обновить</button>
            </div>
        </form>
    </div>
@endsection
