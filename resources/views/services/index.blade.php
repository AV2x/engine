@extends('layouts.app')

@section('services') active @endsection

@section('content')
    <section>
        <div style="@if($banner->file_sub) background-image: url('{{asset('storage/images/banners/resize/sub/'.$banner->file_sub)}}');background-size: cover;
            background-repeat: no-repeat;
            background-position: center center; @else background-color: #ddd;@endif height: 60vh">
            <div class="container" style="min-height: 420px;padding-top: 130px;">

                <div class="row bg-light">
                    <div class="col-md-6 " style="cursor: pointer;box-shadow: 0 0 1px 1px #ddd;" >

                        <div class="dropdown">
                            <div style="width: 100%; padding: 25px;" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                @isset($category)
                                    <span  style="font-size: 23px;" >{{$category->name}}</span>
                                @else
                                    <span  style="font-size: 23px;" >Категория</span>
                                @endisset
                            </div>


                            <ul class="dropdown-menu" style="width: 100%">
                                @forelse($categories as $categoryS)

                                    <li><a class="dropdown-item" href="/services/{{$categoryS->slug}}/@if(\Illuminate\Support\Facades\Request::input('price'))?price={{\Illuminate\Support\Facades\Request::input('price')}} @endif">{{$categoryS->name}}</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 " style="cursor: pointer;box-shadow: 0 0 1px 1px #ddd;" >

                        <div class="dropdown">
                            <div style="width: 100%; padding: 25px;" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                                @if(\Illuminate\Support\Facades\Request::input('price'))
                                    <span  style="font-size: 23px;" >{{\Illuminate\Support\Facades\Request::input('price')}}</span>
                                @else
                                    <span  style="font-size: 23px;" >Цены</span>
                                @endif
                            </div>

                            <?php
                                $prices = [];
                            ?>
                            <ul class="dropdown-menu" style="width: 100%">
                                @isset($category)
                                        @foreach($category->services as $service)
                                            @empty($prices[$service->price])
                                                <li><a class="dropdown-item" href="/services/@isset($category){{$category->slug}}@endisset?price={{$service->price}}">{{$service->price}}</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <?php
                                                $prices[$service->price] = $service->price;
                                                ?>
                                            @endempty
                                        @endforeach
                                @else
                                    @forelse($categories as $categoryP)
                                        @foreach($categoryP->services as $service)
                                            @empty($prices[$service->price])
                                                <li><a class="dropdown-item" href="/services/@isset($category){{$category->slug}}@endisset?price={{$service->price}}">{{$service->price}}</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <?php
                                                $prices[$service->price] = $service->price;
                                                ?>
                                            @endempty
                                        @endforeach
                                    @empty
                                    @endforelse
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="container">
        <section>
            @include('services.items', ['services' => $services])
        </section>
    </div>
@endsection
