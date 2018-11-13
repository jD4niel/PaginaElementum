@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form action="" class="form-horizontal col-md-8 form-registry">
            <h1 class="h1 text-center">Registrar nuevo usuario</h1>
            <hr>
            <div class="form-group row">
                <label for="alumno_nombre" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-md-10">
                    <input type="text" class="form-control col-md-12" id="alumno_nombre" placeholder="Nombre completo" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="apellido_p" class="col-sm-2 col-form-label">Apellidos:</label>
                <div class="col-md-5">
                    <div class="form-group col-md-12">
                    <input type="text" id="alumno_apellido_p" class="form-control" placeholder="Apellido Paterno" required>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group col-md-12">
                    <input type="text" id="alumno_apellido_m" class="form-control" placeholder="Apellido Materno">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email_id" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-md-10">
                    <input type="email" class="form-control col-md-12" id="email_id" placeholder="ejemplo@gmail.com" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="pass_id" class="col-sm-2 col-form-label">Contraseña:</label>
                <div class="col-md-10">
                    <input type="password" class="form-control col-md-12" id="pass_id" minlength="8" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="pass_conf_id" class="col-sm-2 col-form-label">Confirmar contraseña:</label>
                <div class="col-md-10">
                    <input type="password" class="form-control col-md-12" id="pass_conf_id" minlength="8" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="roles" class="col-sm-2 col-form-label">Tipo de rol:</label>
                <div class="col-md-10">
                    <select name="" id="roles" class="form-control">
                        <option value="0" disabled selected>- seleccione un rol -</option>
                        <option value="1"> Administrador </option>
                        <option value="2"> Autor </option>
                        <option value="3"> Escritor elementum </option>
                    </select>
                </div>
            </div>
            <br>
            <hr>
            <div class="form-group-row text-center">
                <input type="submit" value="Registrar usuario" class="btn-registry">
            </div>
        </form>
    </div>
</div>
@endsection

@section('script_section')
    <script>

    </script>
@endsection

