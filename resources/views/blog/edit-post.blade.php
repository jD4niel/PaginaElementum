@extends('layouts.app')

@section('style')
    <style>
        .crop{
            overflow:hidden; /* IMPORTANTE */
            position:relative; /* IMPORTANTE */
            align-content: center;
            vertical-align:middle;
            border:1px solid #ccc;
            height:175px;

        }
        /* Ocultamos parte de la imagen */
        .crop img{
            position:absolute;
        }
        .file-input-wrapper {
            overflow: hidden;
            position: relative;
            cursor: pointer;
        }
        .file-input-wrapper > input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0;
        }
    </style>
@endsection

@section('content')
<div class="container" style="background-color: white">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="h1 text-center">Editar entrada</h1>
            </div>
            <div class="panel-body">
                <form method="post" id="form-entrada" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" value="{{$entrada->id}}" name="id" id="id" hidden>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Título" value="{{$entrada->nombre}}" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="intro" name="intro" placeholder="Introducción" rows="5" required>{{$entrada->intro}}</textarea>
                            </div>
                            <div class="form-group">
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option value="{{$entrada->user_id}}" selected>{{$autor->nombre.' '.$autor->apellido_p.' '.$autor->apellido_m}}</option>
                                    @foreach($autores as $item)
                                        <option value="{{$item->id}}">{{$item->nombre.' '.$item->apellido_p.' '.$item->apellido_m}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input name="etiquetas" id="etiquetas" class="form-control bootstrap-tagsinput"  type="text" value="{{$entrada->etiquetas}}" data-role="tagsinput" placeholder="Etiquetas">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="file-input-wrapper">
                                    <button class="btn btn-default btn-block">Seleccionar miniatura</button>
                                    <input class="form-control" id="file" name="file" type="file" placeholder="Portada/Miniatura" accept="image/*" required>
                                </div>
                            </div>
                            <div class="crop">
                                <div class="form-group">
                                    <img id="blah" class="img-responsive objetfitcover" src="{{asset("images/entradas/")}}/{{$entrada->imagen}}" alt="Miniatura" style="width: 100%">
                                    <input type="text" value="{{$entrada->imagen}}" name="imagen" id="imagen" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                    </div>
                    <div class="row" style="padding: 15px">
                        <div class="form-group">
                            <textarea id="texto" name="texto" required>{{$entrada->texto}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="com-md-12">
                            <div class="form-group text-center">
                                <input id="submit" type="submit" value="Registrar entrada" class="btn-add-new">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    {{--<button onclick="ver()">VEr</button>--}}
@endsection

@section('script_section')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>

        $("#file").change(function() {
            readURL(this);
        });

        $('#etiquetas').tagsinput({
            maxTags: 5,
            confirmKeys: [44]
        });

        CKEDITOR.replace( 'texto', {
            filebrowserUploadUrl: '{{ route('upload.ck',['_token' => csrf_token() ]) }}',
            filebrowserUploadMethod: 'form',
            height: 500

        });

        $('#form-entrada').on('submit', function(event){
            event.preventDefault();
            var formData = new FormData(this);
            formData.set('texto',CKEDITOR.instances['texto'].getData());
            Swal.fire({
                title: "¿Guardar cambios?",
                text: "Se editará la entrada con los cambios realizados",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url:"{{route('update.post')}}",
                        method:"POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:formData,
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(data)
                        {
                            var url = "/entradas";
                            $(location).attr('href',url);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus + ': ' + errorThrown);
                        }
                    })
                }
            });
        });

        function aumentar() {
            var a=1;
            console.log(a);
            document.execCommand( 'fontSize',false,a);
            a++;
        }
        function tamanoLetra() {
            var s = $('#fonts option:selected').val();
            //console.log(s)
            console.log(document.execCommand( 'fontSize',false,s))
            document.execCommand( 'fontSize',false,s);
        }

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endsection

