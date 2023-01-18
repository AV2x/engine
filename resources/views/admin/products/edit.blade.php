@extends('admin.layouts.app')

@section('content')
    <div>
        <h1 class="display-6">Обновление товара</h1>
    </div>
    <hr>
    <div class="col-md-6">

        <form action="{{route('products.update', $product)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text" id="name">Название</span>
                <input type="text" name="name" value="{{$product->name}}" placeholder="товар №123" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Категория</label>
                <select class="form-select" id="inputGroupSelect01" name="category_id">
                        @forelse($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
                            @if($category->categories)
                                @foreach($category->categories as $parentCategory)
                                        <option value="{{$parentCategory->id}}" @if($parentCategory->id == $product->category_id) selected @endif>-{{$parentCategory->name}}</option>
                                @endforeach
                            @endif
                        @empty
                            <option value="">Категорий нет, сначала создайте категорию</option>
                        @endforelse
                </select>
            </div>
            <hr>
            <div id="prices">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="price">Цена</span>
                    <input type="text" name="price" value="{{$product->price}}" placeholder="от 4 млн" class="form-control" aria-label="Цена" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <hr>
            <h4>Описание</h4>
            <textarea id="description" name="description" class="form-control" aria-label="Описание" style="height: 100px;">{!! $product->description !!}</textarea>
            <script type="text/javascript">
                var ckeditor1 = CKEDITOR.replace( 'description' );
                AjexFileManager.init({
                    returnTo: 'ckeditor',
                    editor: ckeditor1
                });
            </script><br>
            <h4>Картинка</h4>
            @if($product->image)
                <div class="row" style="padding-bottom: 15px;">

                        <div class="col-md-3">
                            <img src="{{asset('storage/images/products/origin/'.$product->image)}}" style="width: 100%" alt="">
                        </div>

                </div>
            @endif
            <div class="input-group mb-3">
                <input type="file" multiple name="image" class="form-control" id="inputGroupFile02">
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-primary">Создать</button>
            </div>
        </form>
    </div>

    <script>
        var i = 1;
        var p = 1;
        function addOptions()
        {
            let options = document.getElementById('options');
            var html = '<div class="input-group mb-3" id="option_'+i+'">'+
                '<div class="row">'+
                '<div class="col-md-6">'+
                '<span class="input-group-text">Название</span>'+
                '<input type="text" name="options_name[]" placeholder="Площадь" class="form-control" aria-label="Название характеристики" aria-describedby="inputGroup-sizing-default">'+
                '</div>'+
                '<div class="col-md-6">'+
                '  <span class="input-group-text">Значение</span>'+
                ' <input type="text" name="options_value[]" placeholder="20кв/м" class="form-control" aria-label="Название характеристики" aria-describedby="inputGroup-sizing-default">'+
                ' </div>'+
                '</div>'+
                '<div class="row">'+
                '<a style="color: white;"  class="btn btn-outline-dark" onclick="removeOption('+i+')">&#10006;</a>'+
                '</div>'+
                '</div>';
            options.insertAdjacentHTML('beforeend', html);
            i++;
        }
        function removeOption(id){
            document.getElementById('option_'+id).remove();
        }


        function addPrice()
        {
            let prices = document.getElementById('prices');
            var html = '<div class="input-group mb-3" id="price_'+i+'">'+
                '<div class="row">'+
                '<div class="col-md-6">'+
                '<span class="input-group-text">Описание цены</span>'+
                '<input type="text" name="prices_name[]" placeholder="Брус камерной сушки" class="form-control" aria-label="Название характеристики" aria-describedby="inputGroup-sizing-default">'+
                '</div>'+
                '<div class="col-md-6">'+
                '  <span class="input-group-text">Цена</span>'+
                ' <input type="text" name="prices_value[]" placeholder="от 3.6 млн" class="form-control" aria-label="Название характеристики" aria-describedby="inputGroup-sizing-default">'+
                ' </div>'+
                '</div>'+
                '<div class="row">'+
                '<a style="color: white;"  class="btn btn-outline-dark" onclick="removePrice('+i+')">&#10006;</a>'+
                '</div>'+
                '</div>';
            prices.insertAdjacentHTML('beforeend', html);
            i++;
        }
        function removePrice(id){
            document.getElementById('price_'+id).remove();
        }
    </script>
@endsection
