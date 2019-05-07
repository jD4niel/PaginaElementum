@extends('template')
@section('footer')  
 <footer id="foter">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    {!!  nl2br(e($elementum->direccion)) !!}
                    <br>
                    <hr style="background-color: white; width: 250px; float:left;">
                </div>
                <div class="col-md-6 align-content-right" style="align-content: right; text-align: right;">
                    <a id="fb_link" target="_blank" href="{{ $elementum->facebook }}"><i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px;" class="fab fa-facebook-f social_icons link"></i></a>
                    <a id="tw_link" target="_blank" href="{{ $elementum->twitter }}"><i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px;" class="fab fa-twitter social_icons link"></i></a>
                    <a id="insta_link" target="_blank" href="{{ $elementum->insta }}"><i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px;" class="fab fa-instagram social_icons link"></i></a>
                    <br>
                    Teléfono <br>
                    {{ $elementum->telefono }} <br>
                    <hr style="background-color: white; width: 200px; float: right;">
                </div>
            </div>
            <div class="row">
                <div style="margin:0 auto -35px auto;">© Todos los derechos reservados para Editorial Elementum 2012</div>
            </div>
        </div>
    </footer>
@endsection