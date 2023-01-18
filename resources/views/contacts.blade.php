@extends('layouts.app')

@section('contacts') active @endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="padding-top: 100px;">
                <h1>Контакты</h1>
                @foreach($contacts as $contact)
                    <div style="padding-left: 60px;">
                        <h2 class="display-6" style="font-size: 30px;">{{$contact->name}}</h2>
                        <p class="lead" style="font-size: 28px; color: #0b5ed7">{{$contact->tel}}</p>
                        <p class="fw-bold" style="font-size: 22px;">{{$contact->address}}</p>
                        <div class="col-md-5">
                            <table class="table">
                                <tr>
                                    <td style="font-size: 22px;">Будни</td>
                                    <td style="font-size: 22px;">{{$contact->time_job_weekday}}</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 22px;">сб. - вс.:</td>
                                    <td style="font-size: 22px;">{{$contact->time_job_weekend}}</td>
                                </tr>
                            </table>
                        </div>
                        <button class="btn btn-success form-control" style="padding: 15px; font-size: 22px;">Отправить сообщение</button>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6" style="min-height: 720px; background-color: #ddd">

            </div>
        </div>
    </div>
@endsection
