@extends('layouts.app')

@section('company') active @endsection

@section('content')
    <div style="background-color: #f3f3f3">
        <div class="container bg-light col-md-6">

            <div class="col-md-12" style="padding-top: 100px;">
                <div class="container col-md-12" style="@if($company->image) background-image: url('{{asset('storage/images/company/'.$company->image)}}');background-size: cover;
                    background-repeat: no-repeat; @else background-color: #ddd;@endif height: 30vh">

                </div>
                {!! $company->main_description !!}
            </div>

        </div>
    </div>
@endsection
