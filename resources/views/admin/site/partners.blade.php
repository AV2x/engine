@extends('admin.layouts.app')

@section('content')
    @include('admin.site.tabs', ['active' => 'partners'])
    <div class="col-md-6" style="padding-top: 30px;">
        <h4>Редактирование Партнеров</h4>
        <hr>
        <form action="/admin/partners/update" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(isset($partners[0]))
                <img src="{{asset('storage/images/partners/'.$partners[0]->image)}}" alt="" width="100%">
            @endif
            <div class="input-group mb-3">
                <input type="file" name="images[]" class="form-control" id="inputGroupFile02">
            </div>
            @if(isset($partners[1]))
                <img src="{{asset('storage/images/partners/'.$partners[1]->image)}}" alt="" width="100%">
            @endif
            <div class="input-group mb-3">
                <input type="file" name="images[]" class="form-control" id="inputGroupFile02">
            </div>
            @if(isset($partners[2]))
                <img src="{{asset('storage/images/partners/'.$partners[2]->image)}}" alt="" width="100%">
            @endif
            <div class="input-group mb-3">
                <input type="file" name="images[]" class="form-control" id="inputGroupFile02">
            </div>
            @if(isset($partners[3]))
                <img src="{{asset('storage/images/partners/'.$partners[3]->image)}}" alt="" width="100%">
            @endif
            <div class="input-group mb-3">
                <input type="file" name="images[]" class="form-control" id="inputGroupFile02">
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-primary">Обновить</button>
            </div>
        </form>
    </div>
@endsection
