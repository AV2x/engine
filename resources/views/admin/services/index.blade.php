@extends('admin.layouts.app')

@section('content')
    <div>
        <h1 class="display-6">Услуги</h1>
    </div>
    <div>
        <a href="{{route('services.create')}}" class="btn btn-outline-secondary" >Создать</a>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Картинка</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($services as $key => $service)
                <tr>
                    <td>{{$key +1}}</td>
                    <td>{{$service->name}}</td>
                    <td>{{$service->category->name}}</td>
                    <td style="width: 25%">
                        @if($service->image)
                            <img src="{{asset('storage/images/services/origin/'.$service->image->filename)}}" class="d-block w-50" alt="...">
                        @endif
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{route('services.edit', $service)}}" class="btn btn-primary">Ред.</a>
                            </div>
                            <div class="col-md-1">
                                <form action="{{route('services.destroy', $service)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Вы уверены что хотите удалить этот сервис?')" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Нет услуг</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
