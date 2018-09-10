@extends('template')
@section('home')
    <div class="separador"></div>
<div class="container ">
    <div class="row">
        <div class="col-md-5">
                <img class="img-responsive" src="{{ URL::to('/') }}/images/libros/ansina.png" alt="" height="400px">


        </div>
        <div class="col-md-7">
            <h1>Colaborador y amigo</h1>
            <h5>la lente discreta de jesus cruz</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur exercitationem laborum maiores modi quaerat
                quia reprehenderit soluta sunt vel. Ab animi exercitationem minima vel velit! Commodi dolor error molestiae veritatis!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur exercitationem laborum maiores modi quaerat
                quia reprehenderit soluta sunt vel. Ab animi exercitationem minima vel velit! Commodi dolor error molestiae veritatis!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur exercitationem laborum maiores modi quaerat
                quia reprehenderit soluta sunt vel. Ab animi exercitationem minima vel velit! Commodi dolor error molestiae veritatis!</p>
            <div>
                <span>Autor: </span><span>sin dato</span>
            </div>
            <br>
            <div>
                <h2>$250</h2>
            </div>


        </div>
    </div>
    <br>
    <div class="row">
        <div style="padding-left: 50px;" class="table-responsive col-md-6 center-block">
            <table id="formato_compra" class="">
                <thead class="bg-warning"><tr><th colspan="2" scope="col">México</th></tr></thead>
                <tbody>
                <tr>
                    <td>Libro</td>
                    <td><input type="radio" name="tipo"></td>
                </tr>
                <tr>
                    <td>E-book</td>
                    <td><input type="radio" name="tipo"></td>
                </tr>
                <tr><td><select style="width: 100%; height: 100%; border: none;padding-top: 5px;padding-bottom: 5px;" name="" id="">
                            <option value="" disabled selected>Seleccionar tienda</option>
                            <option value="">Amazon</option>
                            <option value="">Ebay</option>
                        </select></td></tr>
                </tbody>
                <tfoot class="bg-warning"><tr>
                    <td id="btnComprar" colspan="2">Comprar</td>
                </tr></tfoot>
            </table>
        </div>
        <div class="col-md-6" >
            <button id="btnFrag" style="float: right;">Leer fragmento</button>
            <br>
            <br>
            <div style="text-align: right;">
                Lorem ipsum dolor sit snjdsajasdn asjndsdn
            </div>
            <br>
            <div style="float: right;">Compartir &nbsp;<i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-facebook-f social_icons"></i>
                <i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-twitter social_icons"></i>
                <i style="font-size: 15px; padding-top:6px;height: 30px; width: 30px; color: black" class="fab fa-instagram social_icons"></i>
            </div>
        </div>
    </div>
    <div class="separador"></div>
    <div class="row">
        <h1>OBRAS RELACIONADAS </h1>

    </div>
</div>
@endsection

@section('script_collection')
    <script>
        $(document).ready(function () {
            $("#btnComprar").click(function () {
                window.location.href = "https://www.amazon.com.mx/b?ie=UTF8&node=9298576011";
            });
        });
        /***************************************/

    </script>
@endsection