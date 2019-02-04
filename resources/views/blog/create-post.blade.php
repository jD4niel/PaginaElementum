@extends('layouts.app')

@section('style')
    <style>
    </style>
@endsection

@section('content')
<div class="container" style="background-color: white">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="h1 text-center">Nueva entrada</h1>
            </div>
            <div class="panel-body">
                <form method="post" id="form-entrada" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Título">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="intro" name="intro" placeholder="Introducción" rows="5"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="0">Seleccione un Autor</option>
                                    @foreach($autores as $item)
                                        <option value="{{$item->id}}">{{$item->nombre.' '.$item->apellido_p.' '.$item->apellido_m}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control" id="file" name="file" type="file" placeholder="Portada/Miniatura" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <input name="etiquetas" id="etiquetas" class="form-control bootstrap-tagsinput"  type="text" value="" data-role="tagsinput" placeholder="Etiquetas">
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
                </form>
            </div>
        </div>
    </div>
</div>
    {{--<button onclick="ver()">VEr</button>--}}
@endsection

@section('script_section')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>
        $('#etiquetas').tagsinput({
            maxTags: 5,
            confirmKeys: [44]
        });

        CKEDITOR.replace( 'texto', {
            filebrowserUploadUrl: '{{ route('upload.ck',['_token' => csrf_token() ]) }}',
            filebrowserUploadMethod: 'form',
        });

        $('#form-entrada').on('submit', function(event){
            event.preventDefault();
            var formData = new FormData(this);
            formData.set('texto',CKEDITOR.instances['texto'].getData());
            for (var pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]);
            }
            $.ajax({
                url:"{{route('crear.entrada')}}",
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
                    console.log('bien');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + ': ' + errorThrown);
                }
            })
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

    </script>

@endsection

