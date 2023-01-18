@extends('layouts.app')

@section('jobs') active @endsection

@section('content')

    <div style="background-color: #f3f3f3; padding-top: 30px; padding-bottom: 20px;">
        <div class="container bg-light rounded" style="padding-top: 25px;">
            <section>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Услуги</li>
                    </ol>
                </nav>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item"><a href="#">Работы</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Дом №123</li>
                    </ol>
                </nav>
            </section>
            <section>
                <h1 class="display-4">Правильный дом 3711</h1>
                <div class="row">
                    <div class="col-md-7">
                        <div >
                            <a href="{{asset('storage/images/1.png')}}" data-fancybox="gallery">
                                <img src="{{asset('storage/images/1.png')}}" alt="" style="width: 100%">
                            </a>
                        </div>
                        <div>
                            <div class="row" style="margin-left: 0px;">
                                @for($i = 0; $i < 6; $i++)
                                    <div style="width: 30%; padding: 0; margin: 5px;">
                                        <a href="{{asset('storage/images/1.png')}}" data-fancybox="gallery">
                                            <img src="{{asset('storage/images/1.png')}}" alt="" width="100%">
                                        </a>
                                    </div>
                                @endfor

                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div style="padding-bottom: 60px;">
                            <p class="display-6"> <b>Цена:</b> от 4.0 млн руб.</p>
                            <a href="#" class="btn btn-primary">Получить презентацию</a>
                        </div>
                        <div style="padding-bottom: 60px;">
                            <h2 >Характеристики</h2>
                            <table class="table">
                                <tr>
                                    <td>Размеры</td>
                                    <td>15 x 15 м</td>
                                </tr>
                                <tr>
                                    <td>Площадь</td>
                                    <td>336 м2</td>
                                </tr>
                                <tr>
                                    <td>Этажность</td>
                                    <td>2 этажа</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>

            </section>

            <section style="padding: 50px;">
                <h2>Описание</h2>
                <p class="lead">
                    Проект «Правильный дом 3711» площадью 336 м2 — отличный вариант недорогого и комфортного жилья для вашей семьи. В двухэтажном доме (размером 15 x 15 м) выполнено удачное зонирование планировки и для каждого предусмотрены необходимые комнаты.
                </p>
                <p class="alert alert-primary lead" role="alert">
                    Особенность проекта 3711 — возможность легкой перепланировки помещений под персональные предпочтения каждого члена семьи. Для этой задачи наш архитектор бесплатно и быстро поможет адаптировать проект для вас. 👉
                </p>
                <p class="lead">
                    Стоимость строительства дома по проекту 3711 из профилированного бруса — от 4 032 000 руб.

                    Наш ипотечный брокер соберёт необходимые документы, отправит во все ведущие банки Тюмени и подберет для вас самые выгодные условия ипотеки под строительство дома. Расчетная стоимость ежемесячного платежа составляет 32 442 руб./мес.
                </p>
            </section>
            <section style="padding: 50px;">
                <h2>Похожие проекты</h2>
                <div class="row">
                    @for($i = 0; $i < 4; $i++)
                        <div class="card" style="width: 18rem; margin: 5px; border: none; box-shadow: 0px 0px 1px 1px #f3f3f3">
                            <img src="{{asset('storage/images/1.png')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Правильный дом 3723</h5>
                                <p class="card-text">от 3.2 млн руб.</p>

                            </div>
                        </div>
                    @endfor
                </div>
            </section>
            <section style="padding: 50px;">
                <div  class="alert alert-primary" role="alert">
                    <h3>Нужна консультация архитектора?</h3>
                    <p>
                        Подробно расскажем с чего начать строительство, сделаем эскизный проект вашего дома и расположим его на участке с учётом движения солнца, покажем наши построенные объекты и рассчитаем стоимость строительства вашего идеального дома!
                    </p>
                    <a href="#" class="btn btn-light">Позвонить</a>
                </div>
            </section>
        </div>
    </div>
@endsection
