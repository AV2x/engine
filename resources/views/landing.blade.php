<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prime Engine движок для продвижения бизнеса</title>
    <meta name="description" content="">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"
    />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.0-dist/css/bootstrap.css')}}">
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(90455623, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/90455623" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body class="antialiased" style="background-color: #272727">

<section>
    <div class="backColor" style="background-size: cover;
        background-repeat: no-repeat;
        background-position: center center; height: 100vh;vertical-align: bottom;" id="background">
        <div style="height: 20vh"></div>
        <div style="margin: auto;width: 60.5%;">
{{--        <div id="engine" style="display: none;">--}}
{{--            <h1 style="color: white; font-size: 50px;"><span style="color: #e6af43">Prime</span> Engine</h1>--}}
{{--            <p style="color: white">Движок для создания интернет сервиса</p>--}}
{{--        </div>--}}
            <div style="margin: auto;width: 40%;" id="zvezda">

            <img class="rot" src="{{asset('storage/images/landing/zvezda2.png')}}"  alt="">
            </div>
        </div>
    </div>
    <div style="background-image: url('{{asset('storage/images/landing/background.jpg')}}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center; display: none; height: 70vh;vertical-align: bottom;" id="backgroundHidden">
        <div style="height: 20vh"></div>
        <div style="margin: auto;width: 80.5%;">
            <div class="container" style="height: 60vh;">

                <div style="background-color: rgb(38 36 36 / 74%); padding: 20px 10px">
                    <h1 class="display-4 text-light"><span style="color: #e6af43">Prime</span> Engine</h1>
                    <h2 class="lead text-light">Движок по созданию интернет сервиса</h2>
                </div>

            </div>
            <div style="margin: auto;width: 40%;" id="zvezda">
            </div>
        </div>
    </div>
</section>

<div id="content" style="display: none;">
    <section>
        <div style="padding: 30px 10px;" class="container">
            <h2 class="display-5 font-weight-bold" style="text-align: center">Что может Prime Engine</h2>
            <div class="row" style="padding-top: 50px;">
                <p class="display-6" style=" padding: 30px ; font-weight: bold !important;">Работа с клиентами</p>
                <div class="col-md-5">
                    <img src="{{asset('storage/images/landing/strecker.png')}}" width="100%" alt="">
                </div>
                <div class="col-md-5">
                    <p class="lead" style="margin-top: 15px;">Автоматизированный телеграм бот ведёт работу с клиентами, сообщает им этапы проведения работ, что сильно снижает нагрузку на менеджеров. Клиент контролирует свой заказ, т.к. получает информацию о нем и становится максимально лоялен к вашему сервису</p>
                    <div style="margin: 0 auto; width: 50px; padding: 15px 0">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" style="font-size: 23px;">Попробовать</button>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row" style="padding-top: 50px;">
                <p class="display-6" style="padding: 30px ;text-align: center; font-weight: bold !important;">Заказы в телеграм</p>
                <div class="col-md-5">
                    <p class="lead" style="margin-top: 15px;">Новые заказы и вся работа с ними ведётся в телеграм. Вы и ваши менеджеры всегда можете отслеживать всю работу над заказом в реальном времени. Так же получаете уведомления о каждом действии с заказом, которые происходят автоматически
                    </p>
                    <div style="margin: 0 auto; width: 50px; padding: 15px 0">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" style="font-size: 23px;">Попробовать</button>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="{{asset('storage/images/landing/ttraker.png')}}" width="100%" alt="">
                </div>
            </div>
            <hr>
            <div class="row" style="padding-top: 50px;">
                <p class="display-6" style=" padding: 30px ;font-weight: bold !important;">Обработка постоянных клиентов</p>
                <div class="col-md-5">

                    <img src="{{asset('storage/images/landing/clients.png')}}" width="100%" alt="">
                </div>
                <div class="col-md-5">
                    <p class="lead" style="margin-top: 15px;">Движок собирает профиль клиента, и создаёт уместную рассылку с возможностью повторения заказа</p>
                    <div style="margin: 0 auto; width: 50px; padding: 15px 0">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" style="font-size: 23px;">Попробовать</button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row" style="padding-top: 50px;">
                <p class="display-6" style="padding: 30px ;text-align: center; font-weight: bold !important;">Сайт c сео оптимизацией</p>
                <div class="col-md-5">
                    <p class="lead" style="margin-top: 15px;">Движок так же представляет возможность создания собственного сайта, со своей cms/crm системой, в которой разберётся даже ребенок</p>
                    <p class="lead">
                        В движке предусмотрен искусственный интеллект, который обрабатывает свыше 52000 запросов в секунду и принимает решения, где выгоднее занять лидирующие позиции, чтобы встать на поток клиентов.
                    </p>
                    <div style="margin: 0 auto; width: 50px; padding: 15px 0">
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" style="font-size: 23px;">Попробовать</button>
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="{{asset('storage/images/landing/cms.png')}}" width="100%" alt="">
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #f8f8f8">
        <div style="padding: 30px 0; " class="container">
            <h2 class="display-5 font-weight-bold" style="text-align: center">Посмотреть в действии</h2>
            <div  id="video-block" style="width: 70%; margin: 0 auto; padding-top: 50px;">
                <iframe id="video" width="100%" style="height: 450px" src="https://www.youtube.com/embed/V_w8GDbl3dU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <section >
        <div style="padding: 30px 20px; " class="container">
            <h2 class="display-5 font-weight-bold" style="text-align: center">Что может еще?</h2>
            <div style="padding-top: 40px;">
                <div class="row">
                    <div class="col-md-3" style="border: 1px solid #ddd; padding: 20px 10px;">
                       <div style="margin: 0 auto; width: 100px; padding: 20px 0;">
                           <img width="100" class="rounded-circle" src="{{asset('storage/images/landing/path.jpg')}}" alt="">
                       </div>
                        <p  class="lead" style="text-align: center;font-weight: bold">Доставка/перевозка</p>
                        <p class="lead" style="text-align: center">
                            Клиент так же может видеть, как курьер перемещается на карте по заданному маршруту, где рассчитывается время с учетом пробок.
                        </p>
                    </div>
                    <div class="col-md-3 adjastments" style="margin: 0 80px; border: 1px solid #ddd; padding: 20px 10px;">
                        <div style="margin: 0 auto; width: 100px; padding: 20px 0;">
                            <img width="100" src="{{asset('storage/images/landing/arrows3_5110.jpg')}}" alt="">
                        </div>
                        <p  class="lead" style="text-align: center;font-weight: bold">Привлечение клиентов</p>
                        <p class="lead" style="text-align: center">
                            Расширяет поиск новых клиентов из соседних сфер по схожим услугам.
                        </p>
                    </div>
                    <div class="col-md-3 adjastments"  style="margin: 0 0; border: 1px solid #ddd; padding: 20px 10px;">
                        <div style="margin: 0 auto; width: 100px; padding: 20px 0;">
                            <img width="100" src="{{asset('storage/images/landing/arrows4.jpg')}}" alt="">
                        </div>
                        <p  class="lead" style="text-align: center;font-weight: bold">ЭЦП</p>
                        <p class="lead" style="text-align: center">
                            Бот может задавать уточняющие вопросы клиентам, если в этом есть необходимость.
                        </p>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section style="">
        <div style="padding: 30px 20px; margin: 0 auto;" >
            <h2 class="display-5 font-weight-bold" style="text-align: center;">Тарифы</h2>
            <div style="padding-top: 40px;">
                <div class="row justify-content-center">
                    <div class="col-md-3 rounded-3" style="padding: 0; box-shadow: 0 0 11px 5px rgb(55 78 112 / 50%)">
                        <div class="rounded-3" style="padding: 40px 40px;height: 200px;background-image: linear-gradient(130deg, #725ef2 45%, rgba(114, 94, 242, 0.5))">
                            <p  class="lead" style="font-weight: 400; font-size: 26px; color: white;">Пакет Демо</p>
                            <p class="lead" style="font-weight: 400; font-size: 17px; color: #ddd;margin-bottom: 0">
                                <s>5`000 руб/мес</s>
                            </p>
                            <p  class="lead" style="font-weight: 400; font-size: 30px; color: white;margin-top: 0">
                                Бесплатно
                            </p>
                        </div>
                        <div >
                            <ul>
                                <li class="lead" style="border-bottom: 1px solid #ddd">Сайт</li>
                                <li class="lead" style="border-bottom: 1px solid #ddd">Настроенное сео</li>
                                <li class="lead" style="border-bottom: 1px solid #ddd">Бот по работе с клиентами</li>
                                <li class="lead" style="border-bottom: 1px solid #ddd">Заказы в телеграм</li>
                            </ul>
                        </div>
                        <div class="col-md-11" style="margin: 10px auto;">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" style="width: 100%; font-size: 22px;">
                                Попробовать бесплатно
                            </button>
                        </div>

                    </div>


                    <div class="col-md-3 rounded-3 adjastments" style="margin-left: 20px; padding: 0; box-shadow: 0 0 11px 5px rgb(55 78 112 / 50%)">
                        <div class="rounded-3" style="padding: 40px 40px;height: 200px;background-image: linear-gradient(130deg, #000000 45%, rgb(255 255 255 / 50%))">
                            <p  class="lead" style="font-weight: 400; font-size: 26px; color: white;">Пакет Pro</p>
                            <p class="lead" style="font-weight: 400; font-size: 17px; color: #ddd;margin-bottom: 0">
                                <s>15`000 руб/мес</s>
                            </p>
                            <p  class="lead" style="font-weight: 400; font-size: 30px; color: white;margin-top: 0">
                                10`000 руб/мес
                            </p>
                        </div>
                        <div style="padding: 0 15px;">
                            <ul>
                                <li class="lead" >Сайт</li>
                                <li class="lead" >Настроенное сео</li>
                                <li class="lead" >Бот по работе с клиентами</li>
                                <li class="lead" >Заказы в телеграм</li>
                                <li class="lead" >Рассылка для постоянных клиентов</li>
                                <li class="lead" >Геолокация</li>
                                <li class="lead" >Автоматический сбор и анализ заказов, фидбеки пользователей в ежедневном отчёте в телеграме</li>
                                <li class="lead" >Получение обновлений</li>
                                <li class="lead" >Дополнительное шифрование данных</li>
                                <li class="lead" >Поддержка</li>
                            </ul>
                        </div>
                        <div class="col-md-11" style="margin: 10px auto;">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" style="width: 100%; font-size: 22px;">Начать</button>
                        </div>

                    </div>

                    <div class="col-md-3 rounded-3 adjastments" style="margin-left: 20px; padding: 0; box-shadow: 0 0 11px 5px rgb(55 78 112 / 50%)">
                        <div class="rounded-3" style="padding: 40px 40px;height: 200px;background-image: linear-gradient(130deg, #d44a4a 45%, rgb(255 255 255 / 50%))">
                            <p  class="lead" style="font-weight: 400; font-size: 26px; color: white;">Пакет Pro (год)</p>
                            <p class="lead" style="font-weight: 400; font-size: 17px; color: #ddd;margin-bottom: 0">
                                <s>180`000 руб/год</s>
                            </p>
                            <p  class="lead" style="font-weight: 400; font-size: 30px; color: white;margin-top: 0">
                                100`000 руб/год
                            </p>
                        </div>
                        <div style="padding: 0 15px;">
                            <ul>
                                <li class="lead" >Все услуги пакета Pro</li>
                                <li class="lead" >2 месяца бесплатно</li>
                            </ul>
                        </div>
                        <div class="col-md-11" style="margin: 10px auto;">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal" style="width: 100%; font-size: 22px;">Начать</button>
                        </div>

                    </div>


{{--                    <div class="col-md-4 adjastments"  style="margin: 0 0; padding: 20px 10px; background-color: white">--}}
{{--                        <div style="border-bottom: 1px solid #ddd">--}}
{{--                            <p  class="lead" style="text-align: center;font-weight: bold">100`000 руб/год</p>--}}
{{--                        </div>--}}
{{--                        <ul>--}}
{{--                            <li class="lead">Услуги предыдущего тарифа</li>--}}
{{--                            <li class="lead">2 месяца бесплатно</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>


            </div>
        </div>
    </section>

    <section>
        <div style="padding: 30px 20px; margin: 0 auto;" >
            <h2 class="display-5 font-weight-bold" style="text-align: center; padding: 30px ;">
                Почему нужно брать сейчас?
            </h2>
            <div class="row justify-content-center">
                <div class="col-md-7 alert alert-info">
                    <p class="lead">
                        Мы не любим никого торопить. Однако, в ближайшее время каждая функция движка будет иметь свою отдельную стоимость. Оформив подписку сейчас, вы получите фиксированную цену за все имеющиеся функции, а так же бесплатные обновления и дополнения
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div style="padding: 30px 20px; margin: 0 auto;" >
            <h2 class="display-5 font-weight-bold" style="text-align: center; padding: 30px ">
                Что сейчас в разработке?
            </h2>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <a href="{{asset('storage/images/landing/rent1.png')}}" data-fancybox="gallery1">
                        <img src="{{asset('storage/images/landing/rent1.png')}}" alt=""  height="140">
                    </a>
                    <a href="{{asset('storage/images/landing/rent2.png')}}" style="display: none" data-fancybox="gallery1">
                        <img src="{{asset('storage/images/landing/rent2.png')}}" alt="" width="100%">
                    </a>
                    <div style="margin-top: 30px;">
                        <h3 style="text-align: center !important;">Отчеты</h3>
                        <p class="lead">Дполонительные отчеты за различные периоды, которые присылаются автоматически и настраиваются из админ-панели.
                        </p>
                    </div>
                </div>
                <div class="col-md-2 bottom">
                    <a href="{{asset('storage/images/landing/office1.png')}}" data-fancybox="gallery2">
                        <img src="{{asset('storage/images/landing/office3.png')}}" alt=""  height="140">
                    </a>
                    <a href="{{asset('storage/images/landing/office2.png')}}" style="display: none" data-fancybox="gallery2">
                        <img src="{{asset('storage/images/landing/office2.png')}}" alt="" width="100%">
                    </a>
                    <div style="margin-top: 30px;">
                    <h3 style="text-align: center !important;">Умный офис</h3>
                    <p class="lead">Работа с персоналом, и создание прозрачной атмосферы онлайн офиса
                    </p>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="https://primeengine.ru/storage/images/landing/cms.png"  data-fancybox="gallery3">
                        <img src="https://primeengine.ru/storage/images/landing/cms.png" alt="" height="140">
                    </a>
                    <div style="margin-top: 30px;">
                    <h3 style="text-align: center !important;">Улучшения</h3>
                    <p class="lead">Улучшение уже существующих функций.
                    </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section>
        <div style="padding: 30px 20px; margin: 0 auto;" >
            <h2 class="display-5 font-weight-bold" style="text-align: center; padding: 30px ">
                Кто мы?
            </h2>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <p class="lead">
                        Мы команда из программистов уровня senior, исследователей в сфере RnD, дизайнеров, копирайтеров и маркетологов. Работали в различных компаниях таких как Saber Interactive. Решили основать собственный стартап в виде движка. В нем мы реализовали множество полезных функций, разработанных нами ранее, которые уже успели зарекомендовать себя на западном рынке.
                    </p>
                </div>
            </div>
        </div>

    </section>

</div>
<style>
    li {
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
        text-align: center;
        font-size: 16px !important;
    }
    @media (max-width: 767px) {
        #video {
            height: 270px !important;
        }
        #video-block {
            width: 100% !important;
        }
        .adjastments {
            margin: 20px 0 !important;
        }
    }
    .backColor {

    }
    .bodyColor {
        background-color: white !important;
    }
    .back {
        background-image: url('{{asset('storage/images/landing/background.jpg')}}');
    }
    img.rot {
        animation: 1s linear 0s normal none infinite running rot;
        -webkit-animation: 1s linear 0s normal none infinite running rot;
        width: 100%;
        vertical-align: bottom;
        /*position: absolute;*/
        /*right: 505px;*/
        /*top: 63px;*/
    }
    @keyframes rot {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    @-webkit-keyframes rot {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>


<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('bootstrap-5.2.0-dist/js/bootstrap.bundle.js')}}"></script>
<script
    src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js">
</script>

<script
    src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js">
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Заявка на доступ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body">
                <form action="" id="form">
                    <div class="form-group">
                        <label for="recipient-name"  class="col-form-label"><b>Email *</b></label>
                        <input type="text" id="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" id="type" class="col-form-label">Сфера деятельности</label>
                        <input type="text" class="form-control" id="typeAccess">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="request()">Запросить</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<script>

    function request()
    {
        var email = document.getElementById('email').value;
        var type = document.getElementById('typeAccess').value;
        fetch('/api/request/get/access', {
            method: 'POST',
            headers: {
                "X-CSRF-Token": '{{ csrf_token() }}',
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify({email: email, type: type})
        });
        document.getElementById('form').remove();
        document.getElementById('body').insertAdjacentHTML('beforeend', '' +
            '<h3>Заявка отправлена</h3>' +
            '<p>Мы вышлем вам логин и пароль на почту</p>'+
            '');
        return true;
    }

    $('#engine').delay(2000).slideDown(500)
    $('#zvezda').delay(1000).animate({
        'marginRight' : "-=50%"
    });
    $('#background').delay(1500).fadeOut(1000);
    $('#backgroundHidden').delay(2500).fadeIn(1500);
    $('#content').delay(2500).show();
    $('body').delay(2500).queue(function(next){
        $(this).addClass("bodyColor");
        next();
    });

    //$('#backgroundHidden').delay(2000).fadeIn(2000);

    //$('#background').fadeIn();
</script>
</body>
</html>
