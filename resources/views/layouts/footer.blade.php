<footer class="text-center text-lg-start bg-white text-muted navbar-fixed-bottom" >


    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3 text-grayish"></i>PrimeEngine
                    </h6>
                    <p>
                        Движок для продвижения вашего бизнеса в интернете
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Услуги
                    </h6>
                    @forelse($categories as $category)
                        <p>
                            <a href="" class="text-reset">{{$category->name}}</a>
                        </p>
                    @empty
                    @endforelse
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Полезные ссылки
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Услуги</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Работы</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">О компании</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Контакты</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Контакты</h6>
                    <p><i class="fas fa-home me-3 text-grayish"></i>{{$contact->address}}</p>
                    <p>
                        <i class="fas fa-envelope me-3 text-grayish"></i>
                        dmitrypovyshev@yandex.ru
                    </p>
                    <p><i class="fas fa-phone me-3 text-grayish"></i>{{$contact->tel}}</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->
</footer>
<!-- Footer -->
