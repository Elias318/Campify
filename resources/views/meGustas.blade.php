@include('header')

<h1 class="titulo_form d-flex justify-content-center align-items-center mt-5">
    LISTA DE ME GUSTAS
</h1>

<!-- Envolvemos todo el contenido en un contenedor para controlar el espacio -->
<div class="carrito-container">
    <!-- Vista de la tabla -->
    <div id="listaMeGustas" class="container-fluid w-correccionMegustas my-5">
        <div class="row border bg-light">
            <div class="col-2 px-2 text-center">Imagen</div>
            <div class="col-3 px-2 text-center">Nombre</div>
            <div class="col-3 px-2 text-center">Categoría</div>
            <div class="col-4 px-2 text-center">Acciones</div>
        </div>
        @foreach ($productos as $meGusta)
            <div class="row border align-items-center productoMegustas-{{$meGusta->producto_id}}">
                <div class="col-2 text-center">
                    <img src="{{ asset('storage/' . $meGusta->producto->imagen_producto) }}" alt="Imagen del producto" style="width: 80px; height: 80px;">
                </div>
                <div class="col-3 text-center">{{ $meGusta->producto->nombre_producto }}</div>
                <div class="col-3 text-center">{{ $meGusta->producto->categoria->nombre_categoria }}</div>
                <div class="botonMeGusta col-4 text-center justify-content-center d-flex">
                    <form method="post" action="{{ route('me-gusta.destroy') }}">
                        @csrf
                        @method("DELETE")
                        <input type="hidden" name="producto_id" value="{{$meGusta->producto_id}}">
                        <button type="submit" class="d-flex justify-content-center align-items-center btn_corazonRoto">
                            <i class="fa-solid fa-heart-crack"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Vista de las tarjetas -->
    <div id="tarjetasMeGustas" class="row d-flex justify-content-center align-items-center mx-2">
        @foreach ($productos as $meGusta)
            <div class="col-12 col-sm-6 col-lg-4 mb-4 d-flex justify-content-center align-items-center mt-5 productoMegustas-{{$meGusta->producto_id}}">
                <div class="tarjeta-producto">
                    <img src="{{ asset('storage/' . $meGusta->producto->imagen_producto) }}" alt="Imagen del producto">
                    <div class="container_datos_tarjeta">
                        <h3>{{$meGusta->producto->nombre_producto}}</h3>
                        <p>{{$meGusta->producto->categoria->nombre_categoria}}</p>
                        <div class="d-flex justify-content-evenly align-items-center">
                            <div class="botonMeGusta me-1">
                                <form method="post" action="{{ route('me-gusta.destroy') }}">
                                    @csrf
                                    @method("DELETE")
                                    <input type="hidden" name="producto_id" value="{{$meGusta->producto_id}}">
                                    <button type="submit" class="d-flex justify-content-center align-items-center btn_corazonRoto">
                                        <i class="fa-solid fa-heart-crack"></i>
                                    </button>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('footer')
