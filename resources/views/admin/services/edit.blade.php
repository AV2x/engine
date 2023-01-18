@extends('admin.layouts.app')

@section('content')
    <div>
        <h1 class="display-6">Обновление услуги</h1>
    </div>
    <hr>
    <div class="col-md-6">

        <form action="{{route('services.update', $service)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <span class="input-group-text" id="name">Название</span>
                <input type="text" name="name" value="{{$service->name}}" placeholder="Услуга №123" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Категория</label>
                <select class="form-select" id="inputGroupSelect01" name="category_id">
                    @forelse($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == $service->category_id) selected @endif>{{$category->name}}</option>
                        @if($category->categories)
                            @foreach($category->categories as $parentCategory)
                                <option value="{{$parentCategory->id}}" @if($parentCategory->id == $service->category_id) selected @endif>-{{$parentCategory->name}}</option>
                            @endforeach
                        @endif
                    @empty
                        <option value="">Категорий нет, сначала создайте категорию</option>
                    @endforelse
                </select>
            </div>
            <hr>
            <div id="prices">
                <div>
                    <h4>Цены</h4>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="price">Цена</span>
                    <input type="text" name="price" value="{{$service->price}}" placeholder="от 4 млн" class="form-control" aria-label="Цена" aria-describedby="inputGroup-sizing-default">
                </div>
                @if($service->prices)
                    @foreach($service->prices as $key => $price)
                        <div class="input-group mb-3" id="price_{{$key}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="input-group-text">Описание цены</span>
                                    <input type="text" value="{{$price->name}}" name="prices_name[]" placeholder="Брус камерной сушки" class="form-control" aria-label="Название характеристики" aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="col-md-6">
                                    <span class="input-group-text">Цена</span>
                                    <input type="text" value="{{$price->price}}" name="prices_value[]" placeholder="от 3.6 млн" class="form-control" aria-label="Название характеристики" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="row">
                                <a style="color: white;"  class="btn btn-outline-dark" onclick="removePrice({{$key}})">&#10006;</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div>
                <a style="color: white;"  class="btn btn-success" onclick="addPrice()">Добавить</a>
            </div>
            <hr>
            <div id="options">
                <div>
                    <h4>Характеристики</h4>
                </div>
                @if($service->options)
                    @foreach($service->options as $key => $option)
                        <div class="input-group mb-3" id="option_{{$key}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="input-group-text">Название</span>
                                    <input type="text" value="{{$option->name}}" name="options_name[]" placeholder="Площадь" class="form-control" aria-label="Название характеристики" aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="col-md-6">
                                    <span class="input-group-text">Значение</span>
                                    <input type="text" value="{{$option->value}}" name="options_value[]" placeholder="20кв/м" class="form-control" aria-label="Название характеристики" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="row">
                                <a style="color: white;"  class="btn btn-outline-dark" onclick="removeOption({{$key}})">&#10006;</a>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <div class="input-group mb-3" id="option_0">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="input-group-text">Название</span>
                                <input type="text" name="options_name[]" placeholder="Площадь" class="form-control" aria-label="Название характеристики" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <div class="col-md-6">
                                <span class="input-group-text">Значение</span>
                                <input type="text" name="options_value[]" placeholder="20кв/м" class="form-control" aria-label="Название характеристики" aria-describedby="inputGroup-sizing-default">
                            </div>

                        </div>
                        <div class="row">
                            <a style="color: white;"  class="btn btn-outline-dark" onclick="removeOption(0)">&#10006;</a>
                        </div>
                    </div>
                @endif
            </div>
            <div>
                <a style="color: white;" class="btn btn-success" onclick="addOptions()">Добавить</a>
            </div>
            <hr>
            <h4>Описание</h4>
            <textarea id="description" name="description" class="form-control" aria-label="Описание" style="height: 100px;">
                {{$service->description}}
            </textarea>
            <script type="text/javascript">
                var ckeditor1 = CKEDITOR.replace( 'description' );
                AjexFileManager.init({
                    returnTo: 'ckeditor',
                    editor: ckeditor1
                });
            </script><br>
            <h4>Картинки</h4>
            @if($service->images)
                <div class="row" style="padding-bottom: 15px;">
                @foreach($service->images as $image)

                        <div class="col-md-3">
                            <img src="{{asset('storage/images/services/origin/'.$image->filename)}}" style="width: 100%" alt="">
                        </div>

                @endforeach
                </div>
            @endif
            <div class="input-group mb-3">
                <input type="file" multiple name="images[]" class="form-control" id="inputGroupFile02">
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-primary">Обновить</button>
            </div>
        </form>
    </div>

    <script>
        var i = {{count($service->options)}};
        var p = {{count($service->prices)}};
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
