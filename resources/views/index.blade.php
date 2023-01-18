@extends('layouts.app')

@section('title') Создание и продвижение сайтов @endsection
@section('description') Создание и продвижение сайтов по всей России @endsection
@section('content')
    <div>
        <section>
            <div style="@if($banner->file_main) background-image: url('{{asset('storage/images/banners/resize/main/'.$banner->file_main)}}');background-size: cover;
                background-repeat: no-repeat;
                background-position: center center; @else background-color: #ddd;@endif height: 60vh">
                <div class="container" style="height: 60vh;padding-top: 120px;">

                    <div style="background-color: rgb(38 36 36 / 74%); padding: 20px 10px">
                        <h1 class="display-4 text-light">{{$banner->title}}</h1>
                        <h2 class="lead text-light">{{$banner->description}}</h2>
                    </div>

                </div>
            </div>
        </section>
        <section>
            <div class="container" style="margin-top: 15px; margin-bottom: 20px;">
                <h3 >Услуги</h3>
                @include('services.items', ['services' => $services])
                <div class="col-md-2">
                    <a href="/services" class="btn btn-success">Показать все</a>
                </div>
            </div>
        </section>
        <div style="border-top: 1px solid #ddd"></div>
        <section style="padding-bottom: 35px; padding-top: 35px;">
            <div class="container" style="margin-top: 15px; margin-bottom: 20px;">
                <h3 >О компании</h3>
                <p class="lead">{!! $company->sub_description !!}</p>
{{--                <div>--}}

{{--                    <div class="row">--}}
{{--                        @for($i = 1; $i<= 4; $i++)--}}
{{--                            <?php--}}
{{--                            $advantageCount = 'advantage_'.$i.'_count';--}}
{{--                            $advantageText = 'advantage_'.$i.'_text';--}}
{{--                            ?>--}}
{{--                        @if($company->$advantageCount && $company->$advantageText)--}}
{{--                                    <div class="col-md-3" style="border: 1px solid #ddd; ">--}}
{{--                                        <p style="margin: 0;color: green;text-align: center; font-size: 25px; width: 100%">--}}
{{--                                            {{$company->$advantageCount}}--}}
{{--                                        </p>--}}
{{--                                        <p style="margin: 0;text-align: center">--}}
{{--                                            {{$company->$advantageText}}--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                        @endif--}}
{{--                        @endfor--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </section>
{{--        <section style="background-color: #f3f3f3; padding-top: 20px; padding-bottom: 20px">--}}
{{--            <div class="container" style="margin-top: 15px; margin-bottom: 20px;">--}}
{{--                <h3 >Наши работы</h3>--}}
{{--                <div class="row">--}}
{{--                    @for($i = 0; $i <= 11; $i++)--}}
{{--                        <div class="col-md-3" style="margin-top: 20px;">--}}
{{--                            <a href="#" >--}}
{{--                                <img src="{{asset('storage/images/1.png')}}" class="w-100" alt="">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @endfor--}}
{{--                </div>--}}
{{--                <div class="col-md-2" style="margin-top: 25px;">--}}
{{--                    <a href="#" class="btn btn-success">Показать все</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

        <section style="padding-top: 20px; padding-bottom: 20px">
            <div class="container" style="margin-top: 15px; margin-bottom: 20px;">
                <h3 >Наши партнеры</h3>
                <div class="row">
                    @forelse($partners as $partner)
                        <div class="col-md-3" style="margin-top: 20px;">
                            <img src="{{asset('storage/images/partners/'.$partner->image)}}" class="w-100" alt="">
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>
        <section style="padding-top: 20px; padding-bottom: 20px; background-color: #f3f3f3;">
            <div class="container">
                <h3 >Отзывы клиентов</h3>
                <div class="row">
                    @forelse($feedbacks as $feedback)
                        <div class="col-md-3" style="background-color: white; border-radius: 4%; padding: 15px; margin:15px 10px;">
                            <div class="row">
                                <div class="col-md-3" style="width: auto;">
                                    <div style="width: 80px; height: 80px; border-radius: 50%; background-image: url('{{asset('storage/images/avatars/'.$feedback->avatar)}}');background-size: cover;
                                        background-repeat: no-repeat;"></div>
                                </div>
                                <div class="col-md-9" style="width: auto;padding: 15px 15px;">
                                    <h5>{{$feedback->name}}</h5>
                                    <p class="lead fs-6">{{$feedback->text}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>

        <section style="padding-top: 20px; padding-bottom: 20px; ">
            <div class="container">
                <h3 >Часто задаваемые вопросы</h3>
                @forelse($questions as $key => $question)
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_{{$key + 1}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{$key + 1}}" aria-expanded="@if($key == 0)true @else false @endif" aria-controls="collapse{{$key + 1}}">
                                {{$question->title}}
                            </button>
                        </h2>
                        <div id="collapse_{{$key + 1}}" class="accordion-collapse collapse @if($key == 0) show @endif" aria-labelledby="heading_{{$key + 1}}" data-bs-parent="#accordionExample">
                            <div class="accordion-body lead">
                                {{$question->description}}
                            </div>
                        </div>
                    </div>
                </div>
                    @empty
                    @endforelse

            </div>
        </section>
    </div>


@endsection
