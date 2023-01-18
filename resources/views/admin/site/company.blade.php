@extends('admin.layouts.app')

@section('content')
    @include('admin.site.tabs', ['active' => 'company'])
    <div class="col-md-6" style="padding-top: 30px;">
        <h4>Редактирование О компании</h4>
        <hr>
        <div>
            <h5><a href="/" target="_blank">На главной странице</a></h5>
            <form action="/admin/company/update" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <textarea id="description" name="description_sub" class="form-control" aria-label="Описание" style="height: 100px;">
                 {{$company->sub_description ?? ''}}
                </textarea>
                <script type="text/javascript">
                    var ckeditor1 = CKEDITOR.replace( 'description' );
                    AjexFileManager.init({
                        returnTo: 'ckeditor',
                        editor: ckeditor1
                    });
                </script>

                <h5>Преимущество в цифрах</h5>
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="name">Число</span>
                            <input type="text" name="advantage_1_count" value="{{$company->advantage_1_count ?? ''}}" placeholder="147" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text" id="name">Работа</span>
                            <input type="text" name="advantage_1_text" placeholder="Построенный объект" value="{{$company->advantage_1_text ?? ''}}" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Число</span>
                            <input type="text" name="advantage_2_count" placeholder="147" value="{{$company->advantage_2_count ?? ''}}" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Работа</span>
                            <input type="text" name="advantage_2_text" placeholder="Построенный объект" value="{{$company->advantage_2_text ?? ''}}" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Число</span>
                            <input type="text" name="advantage_3_count" placeholder="147" value="{{$company->advantage_3_count ?? ''}}" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Работа</span>
                            <input type="text" name="advantage_3_text" placeholder="Построенный объект" value="{{$company->advantage_3_text ?? ''}}" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Число</span>
                            <input type="text" name="advantage_4_count" placeholder="147" value="{{$company->advantage_4_count ?? ''}}" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="name">Работа</span>
                            <input type="text" name="advantage_4_text" placeholder="Построенный объект" value="{{$company->advantage_4_text ?? ''}}" class="form-control" aria-label="Название категории" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                </div>
                <hr>
                <h5>На странице <a href="/company" target="_blank">"О компании"</a></h5>
                @if($company && $company->image)
                    <img src="{{asset('storage/images/company/'.$company->image)}}" alt="" width="100%">
                @endif
                <div class="input-group mb-3">
                    <input type="file" name="image" class="form-control" id="inputGroupFile02">
                </div>
                <span class="input-group-text" id="name">Описание</span>
                <textarea id="description_2" name="description_main" class="form-control" aria-label="Описание" style="height: 100px;">
                {{$company->main_description ?? ''}}
            </textarea>
                <script type="text/javascript">
                    var ckeditor1 = CKEDITOR.replace( 'description_2' );
                    AjexFileManager.init({
                        returnTo: 'ckeditor',
                        editor: ckeditor1
                    });
                </script>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
