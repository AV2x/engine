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
        <form action="{{route('categories.store')}}" method="post">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="name">Название</span>
                <input type="text" required name="name" placeholder="Категория 1" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Главная категория</label>
                <select class="form-select" id="inputGroupSelect01" name="parent_id">
                    @forelse($categories as $category)
                        <option value="{{$category->id}}" >{{$category->name}}</option>
                    @empty
                        <option value="">Категорий нет, сначала создайте категорию</option>
                    @endforelse
                </select>
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-primary">Создать</button>
            </div>
        </form>
    </div>
@endsection
