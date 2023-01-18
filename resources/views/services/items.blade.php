<div class="row">


   @isset($services)
        @foreach($services as $i => $service)
            <div class="col-md-4" style="padding: 15px; ">
                <a href="/services/{{$service->category->slug}}/{{$service->slug}}" style="text-decoration: none;">
                    <div id="carouselExampleIndicators_{{$i}}" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            @foreach($service->images as $key => $image)
                                @if($key == 0)
                                    <button type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                @else
                                    <button type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide-to="{{$key}}" aria-label="Slide 2"></button>
                                @endif

                            @endforeach

                        </div>
                        <div class="carousel-inner">
                            @foreach($service->images as $key => $image)
                                @if($key == 0)
                                    <div class="carousel-item active">
                                        <img src="{{asset('storage/images/services/resize/sliders/'.explode('.', $image->filename)[0].'.webp')}}" class="d-block w-100" alt="...">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{asset('storage/images/services/resize/sliders/'.explode('.', $image->filename)[0].'.webp')}}" class="d-block w-100" alt="...">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="info">
                        <div class="fw-bold text-dark" >{{$service->name}}</div>
                        <div class="text-dark"><span>{{\Illuminate\Support\Str::words(strip_tags(str_replace('</p>', ' ', $service->description)), 5, '...')}}</span></div>
                        <div class="fw-light text-dark">
                            {{$service->price}}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        @for($i = 0; $i <= 11; $i++)
            <div class="col-md-4" style="padding: 15px; ">
                <a href="/service" style="text-decoration: none;">
                    <div id="carouselExampleIndicators_{{$i}}" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('storage/images/1.png')}}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('storage/images/1.png')}}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('storage/images/1.png')}}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators_{{$i}}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="info">
                        <div class="fw-bold" style="color: #adadad">1 спальня  - 2 кровати  </div>
                        <div class="fw-bold text-dark"><span>Однокомнатная квартира посуточно по адресу 50 лет ВЛКСМ д13, к1</span></div>
                        <div class="fw-light">
                            2 500Р/сутки
                        </div>
                    </div>
                </a>
            </div>
        @endfor
    @endisset




</div>
