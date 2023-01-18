@extends('admin.layouts.app')

@section('content')
    @include('admin.site.tabs', ['active' => 'banner'])
    <div class="col-md-6" style="padding-top: 30px;">
        <h4>Редактирование баннера</h4>
        <div>
            <form action="/admin/banner/update" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if($banner && $banner->file_main)
                    <img src="{{asset('storage/images/banners/origin/'.$banner->file_main)}}" alt="" width="100%">
                @endif
                <div class="input-group mb-3">
                    <input type="file"  name="file_main" class="form-control" id="inputGroupFile02">
                </div>
                @if($banner && $banner->file_sub)
                    <img src="{{asset('storage/images/banners/origin/'.$banner->file_sub)}}" alt="" width="100%">
                @endif
                <div class="input-group mb-3">
                    <input type="file"  name="file_sub" class="form-control" id="inputGroupFile02">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">Текст 1</span>
                    <input type="text" name="title" value="{{$banner->title ?? ''}}" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">Текст 2</span>
                    <input type="text" name="description" value="{{$banner->description ?? ''}}" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
