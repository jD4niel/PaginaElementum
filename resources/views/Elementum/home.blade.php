@extends('template')
@section('home')

    <div id="Slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#Slider" data-slide-to="0" class="active"></li>
            <li data-target="#Slider" data-slide-to="1"></li>
            <li data-target="#Slider" data-slide-to="2"></li>
            <li data-target="#Slider" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100"  height="680px" src="{{ URL::to('/') }}/images/img1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" height="680px" src="{{ URL::to('/') }}/images/img2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" height="680px"  src="{{ URL::to('/') }}/images/img3.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" height="680px"  src="{{ URL::to('/') }}/images/img2.jpg" alt="Four slide">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-top: -80px;">
                <div class="input-group mb-3">
                    <input type="text" class="form-control simplebox" placeholder="Búsqueda" aria-label="Recipient's username" aria-describedby="basic-addon2" style="background-color:#e9f2ef;border-top-left-radius: 15px;border-bottom-left-radius: 15px; height:45px;font-size: 20px;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" style="background-color:#e9f2ef;font-size:20px;border-top-right-radius: 18px;border-bottom-right-radius: 18px;border-color: #ccd1cd; border-left-color: #e9f2ef;"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection