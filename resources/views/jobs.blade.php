@extends('layouts.app')

@section('jobs') active @endsection

@section('content')
    <div style="background-color: #f3f3f3; padding-top: 30px; padding-bottom: 20px;">
    <div class="container bg-light rounded" style="padding-top: 25px;">
        <section>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Работы</li>
                </ol>
            </nav>
        </section>
{{--        <section>--}}
{{--            <h1>Работы</h1>--}}
{{--            <div class="row">--}}


{{--                @for($i = 0; $i <= 11; $i++)--}}
{{--                    <div class="col-md-4" style="padding: 15px; ">--}}
{{--                        <a href="/job" style="text-decoration: none;">--}}
{{--                            <div id="carouselExampleIndicators_{{$i}}" class="carousel slide" data-bs-ride="true">--}}
{{--                                <div class="carousel-indicators">--}}
{{--                                    <button type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>--}}
{{--                                    <button type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
{{--                                    <button type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
{{--                                </div>--}}
{{--                                <div class="carousel-inner">--}}
{{--                                    <div class="carousel-item active">--}}
{{--                                        <img src="{{asset('storage/images/1.png')}}" class="d-block w-100" alt="...">--}}
{{--                                    </div>--}}
{{--                                    <div class="carousel-item">--}}
{{--                                        <img src="{{asset('storage/images/1.png')}}" class="d-block w-100" alt="...">--}}
{{--                                    </div>--}}
{{--                                    <div class="carousel-item">--}}
{{--                                        <img src="{{asset('storage/images/1.png')}}" class="d-block w-100" alt="...">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide="prev">--}}
{{--                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                                    <span class="visually-hidden">Previous</span>--}}
{{--                                </button>--}}
{{--                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide="next">--}}
{{--                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                                    <span class="visually-hidden">Next</span>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                @endfor--}}




{{--            </div>--}}

{{--        </section>--}}
    </div>
    </div>
@endsection
