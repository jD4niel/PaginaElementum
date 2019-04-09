@extends('layouts.app')

@section('style')
    <style>
        .crop {
            overflow: hidden; /* IMPORTANTE */
            position: relative; /* IMPORTANTE */
            align-content: center;
            vertical-align: middle;
            height: 175px;
            border: 1px solid #ccc;
            background-color: #ccc;
            border-radius: 2%;
        }

        /* Ocultamos parte de la imagen */
        .crop img {
            position: absolute;
            top: 0px;

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

        .custom-select {
            webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 1px solid rgba(0, 0, 0, 0.01);
            background: transparent;
        }
        .swal2-popup {
            font-size: 1.6rem !important;
        }
    </style>
@endsection

@section('content')
    <div class="container" style="background-color: white">
        <div class="row" style="background-color: rgba(0,0,0,0) !important;">
            @if(!empty($seccion_id))
                <input id="section_val_id" type="hidden" value="{{ $seccion_id }}">
                <div class="container-section">
                    <h3> Sección {{ $section_obj->name }} </h3>
                </div>
            @endif
            <form method="post" id="form-entrada" enctype="multipart/form-data">
                    {{ csrf_field() }}

                <div class="panel panel-default">
                    <div class="row">
                        <p class="h1 text-center">Nueva entrada:
                            <select name="clasificacion_id" id="clasificacion_id" class="custom-select" style="">
                                @foreach($sections as $item)
                                    <option value="{{$item->id}}">{{$item->tipo}}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>
                    <div class="panel-body">
                        <input type="text" name="autor_ex" id="autor_ex" value="999" hidden disabled>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                           placeholder="Título">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="intro" name="intro" placeholder="Introducción"
                                              rows="5"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="checkbox">
                                            <label><input type="checkbox" id="confirm_ce"> Autor Externo</label>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group" id="select-autor">
                                            <select name="user_id" id="user_id" class="form-control">
                                                <option value="" disabled selected>Seleccione un Autor</option>
                                                @foreach($autores->where('is_blog_writer',1) as $item)
                                                    <option value="{{$item->id}}">{{$item->nombre.' '.$item->apellido_p.' '.$item->apellido_m}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group hidden" id="check-autor">
                                            <input id="autor_externo" type="text" class="form-control"
                                                   name="autor_externo" placeholder="Nombre de Colaborador Externo">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group" style="display: block   ">
                                    <label for="etiquetas">Etiquetas(Separar usando una coma): </label><br>
                                    <input name="etiquetas" id="etiquetas" class="form-control bootstrap-tagsinput"
                                           type="text" value="" data-role="tagsinput" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="file-input-wrapper">
                                        <button class="btn btn-default btn-block">Click para seleccionar miniatura
                                        </button>
                                        <input class="form-control" id="file" name="file" type="file"
                                               placeholder="Portada/Miniatura" accept="image/*">
                                    </div>
                                </div>
                                <div class="crop" align="center">
                                    <h2>Portada / Miniatura </h2><br><br>
                                    <h3><b>1280 x 720</b></h3>
                                    <div class="form-group">
                                        <img id="blah" class="img-responsive objetfitcover" src="" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding: 15px">
                            <div class="form-group">
                                <textarea id="texto" name="texto"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="com-md-12">
                                <div class="form-group text-center">
                                    <input id="submit" type="submit" value="Registrar entrada" class="btn-add-new">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--<button onclick="ver()">VEr</button>--}}
@endsection

@section('script_section')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>

        $("#file").change(function () {
            readURL(this);
        });

        $('#etiquetas').tagsinput({
            maxTags: 5,
            confirmKeys: [44]
        });

        CKEDITOR.replace('texto', {
            filebrowserUploadUrl: '{{ route('upload.ck',['_token' => csrf_token() ]) }}',
            filebrowserUploadMethod: 'form',
            height: 500

        });

        $('#form-entrada').on('submit', function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            formData.set('texto', CKEDITOR.instances['texto'].getData());
            if (formData.has('autor_ex')) {
                formData.append('user_id', formData.get('autor_ex'));
                formData.delete('autor_ex');
            }

            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            Swal.fire({
                title: "¿Guardar entrada?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{route('crear.entrada')}}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            var url = "/entradas";
                            $(location).attr('href', url);
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus + ': ' + errorThrown);
                        }
                    });
                }
            });
        });
        $('#confirm_ce').change(function () {
            if ($(this).is(":checked")) {
                $('#select-autor').addClass('hidden');
                $('#check-autor').removeClass('hidden');
                $('#autor_ex').removeAttr('disabled');
            } else {
                $('#autor_ex').attr('disabled');
                $('#select-autor').removeClass('hidden');
                $('#check-autor').addClass('hidden');
            }
        });


        function aumentar() {
            var a = 1;
            console.log(a);
            document.execCommand('fontSize', false, a);
            a++;
        }

        function tamanoLetra() {
            var s = $('#fonts option:selected').val();
            //console.log(s)
            console.log(document.execCommand('fontSize', false, s))
            document.execCommand('fontSize', false, s);
        }

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>

@endsection

