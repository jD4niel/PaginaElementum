@extends('template')
@section('home')
    <figure>
        <img width="100%" src="{{ URL::to('/') }}/images/fotoportadautores.jpg" alt="">
        <figcaption id="tituloAutores">Autores <br>Elementum</figcaption>
    </figure>
    <div class="separador"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Misión</h2>
                <hr>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing
                    Blanditiis culpa dolor est eum fuga nostrum ullam.
                    Accusantium autem dignissimos doloremque ducimus
                    eos fugiat inventore magnam modi nihil optio quam, repellat?
                </p>
            </div>
            <div class="col-md-6">
                <h2>Visión</h2>
                <hr>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing
                    Blanditiis culpa dolor est eum fuga nostrum ullam.
                    Accusantium autem dignissimos doloremque ducimus
                    eos fugiat inventore magnam modi nihil optio quam, repellat?
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                En Elementum aplicamos diversos conceptos y valores en nuestra labor diaria para brindarte la mejor calidad en atención, servicios y productos, basándonos en éstos, hemos logrado un reconocimiento a nivel nacional:
            </div>
        </div>
    </div>
    <div class="separador"></div><br>

@endsection
@section('script_collection')

@endsection
