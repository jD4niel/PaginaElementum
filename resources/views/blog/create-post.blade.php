@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="" class="form-horizontal col-md-12 form-registry">
            <h1 class="h1 text-center">Nueva entrada</h1>
            <hr>
            <div class="form-group row">
                <div class="col-md-11">
                    <input type="text" class="form-control col-md-12" id="alumno_nombre" placeholder="Titulo" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-11">
                   herramientas
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-11">
                    <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                </div>
            </div>


            <br>
            <hr>
            <div class="form-group-row text-center">
                <input type="submit" value="Registrar usuario" class="btn-add-new">
            </div>
        </form>
    </div>
</div>
@endsection

@section('script_section')
    <script>

    </script>
@endsection

