@include('header')

<h1 class="titulo_form d-flex justify-content-center align-items-center mt-5">
    CARRITO
</h1>


<div id="" class="carrito-container container-fluid w-correccionMegustas my-5">
    <div class="row border bg-light pt-2 pb-2">
        <div class="col-3 px-2 text-center">Producto</div>
        <div class="col-2 px-2 text-center">Cantidad</div>
        <div class="col-2 px-2 text-center">Precio</div>
        <div class="col-2 px-2 text-center">Total</div>
        @auth
        <div class="col-3 px-2 text-center">Acciones</div>
        @endauth
    </div>
    @foreach($productosEnCarrito as $item)
        <div class="row border align-items-center pt-2 pb-2" id="producto-{{ $item['producto']->id_producto }}">
            <div class="col-3 text-center">{{ $item['producto']->nombre_producto }}</div>
            <div class="col-2 text-center d-flex justify-content-center align-items-center gap-2">
                <p style="width:10px; margin:0px;" class="">{{ $item['cantidad'] }}</p>
                <button type="button" class="btn_disminuir" data-producto-id="{{ $item['producto']->id_producto }}">
                    <i class="fa-solid fa-arrow-down"></i>
                </button>
            </div>
            <div class="col-2 text-center precio-producto">${{ $item['producto']->precio_producto }}</div>
            <div class="col-2 text-center total-producto">${{ $item['producto']->precio_producto * $item['cantidad'] }}</div>
            @auth
            <div class="col-3 text-center  d-flex justify-content-center align-items-center">
                <button 
                    type="button" 
                    class="btn_meGusta btn-danger btn_eliminar  d-flex justify-content-center align-items-center" 
                    data-producto-id="{{ $item['producto']->id_producto }}">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
            @endauth
        </div>
        
    @endforeach
        @auth

            @if( $productosEnCarrito->isEmpty())
                <div class="d-flex justify-content-center align-items-center">
                    <div class="contenedor-comprar w-50 mt-4 ">
                        <div class="titulo-subtitulo">
                            <h4>Debes agregar algún producto al carrito</h4>
                            
                        </div>
        
                        <div class="titulo-subtitulo">
                            <p>Revisa nuevamente nuestro <a href="{{ route('catalogo') }}">Catalogo</a></p>
                        </div>
                        
                    </div>
                </div>
            
            @else
            <div class="container-btn-finalizar-compra">
                <a href="{{route ('finalizarCompraDeCarrito')}}" class="btn btn-primary btn_form boton-enviar">Finalizar compra</a>
        
            </div>
                
            @endif
            
        @else
            <div class="d-flex justify-content-center align-items-center">
                <div class="contenedor-comprar w-50 mt-4 ">
                    <div class="titulo-subtitulo">
                        <h4>¿Queres comprar?</h4>
                        <a href="http://localhost:8000/inicioSesion"><p>Inicia sesión</p></a>
                    </div>
    
                    <div class="titulo-subtitulo">
                        <p>¿No tenes cuenta? <a href="http://localhost:8000/crearCuenta">¡Registrate!</a></p>
                    </div>
                    
                </div>
            </div>
            
        @endauth
    
</div>

@include('footer')
