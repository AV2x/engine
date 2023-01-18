@extends('admin.layouts.app')

@section('content')
    <div>
        <h1 class="display-6">Товары</h1>
    </div>
    <div>
        <a href="{{route('products.create')}}" class="btn btn-outline-secondary" >Создать</a>
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
            @forelse($products as $key => $product)
                <tr>
                    <td>{{$key +1}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td style="width: 25%">
                        @if($product->image)
                            <img src="{{asset('storage/images/products/origin/'.$product->image)}}" class="d-block w-50" alt="...">
                        @endif
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{route('products.edit', $product)}}" class="btn btn-primary">Ред.</a>
                            </div>
                            <div class="col-md-1">
                                <form action="{{route('products.destroy', $product)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Вы уверены что хотите удалить этот товар?')" class="btn btn-danger">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Нет товаров</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
