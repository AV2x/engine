@extends('layouts.app')


@section('content')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <form action="/authenticate" method="post">
                                    @csrf
                                    <h2 class="fw-bold mb-2 text-uppercase">Авторизация</h2>
                                    <p class="text-white-50 mb-5">Пожалуйста, введите ваш логин и пароль</p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="email" id="typeEmailX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Email</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Пароль</label>
                                    </div>

                                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Забыли пароль?</a></p>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Авторизоваться</button>

                                </form>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
