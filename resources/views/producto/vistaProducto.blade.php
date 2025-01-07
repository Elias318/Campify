@include('header')
<!-- Contenedor general -->

    <div class=" contenedor-contenedor-gral  ">
        <!-- Contenedor de imágenes ilustrativas -->
        <div class="contenedor-imagenes">
            <!-- Imagen -->
            <div class="contenedor-imagen-principal">
                <img src="data:image/jpeg;base64,{{ $producto->imagen_producto }}" alt="Imagen del producto">
               
            </div> 
            <!-- Sub imágenes -->
            <div class="">
                <img src="images/gtr.JPG" alt="" class="">
                <img src="images/gtr.JPG" alt="" class="">
                <img src="images/gtr.JPG" alt="" class="">
                <img src="images/gtr.JPG" alt="" class="">
                <img src="images/gtr.JPG" alt="" class="">
                <img src="images/gtr.JPG" alt="" class="">
            </div>
        </div>
    
        <!-- Contenedor de datos de compra -->
        <div class="contenedor-datos">
            <!-- Nombre y Precio-->
            <div class="">
                <h3 class=" txt-categoria">{{$producto->categoria->nombre_categoria}}</h3>
                <h1 class="txt-titulo">{{$producto->nombre_producto}}</h1>
                <h2 class="txt-precio">$ {{$producto->precio_producto}}</h2>
            </div>
            
            <!-- Formas de pago -->
            <div class="mb-4 mt-4">
                <h3 class="fs-6">Nuestras promociones bancarias</h3>
                <h4 class="fs-6 color-cuotas">12 Cuotas sin interés de $...</h4>
                <!-- Tarjetas en miniatura -->
                <div class="tarjetas-chicas d-flex justify-content-start align-items-center gap-1">
                    <img src="images/tarjetas/american-express.JPG" alt="" class="img-fluid">
                    <img src="images/tarjetas/bbva.JPG" alt="" class="img-fluid">
                    <img src="images/tarjetas/cabal.JPG" alt="" class="img-fluid">
                    <img src="images/tarjetas/mastercard.jpg" alt="" class="img-fluid">
                    <img src="images/tarjetas/naranja.jpg" alt="" class="img-fluid">
                    <img src="images/tarjetas/visa.jpg" alt="" class="img-fluid">
                </div>
            </div>
    
            <div class="linea-divisoria my-4"></div>
    
            <!-- Cosas de envío -->
            <div class="envios mt-1 mb-3">
                <div class="d-flex justify-content-start align-items-center gap-2">
                    <i class="fa-solid fa-truck fa-lg text-secondary"></i>
                    <p>Envío gratis a ...</p>
                </div>
                <div class="d-flex justify-content-start align-items-center gap-2">
                    <i class="fa-solid fa-box fa-lg text-secondary"></i>
                    <div class="d-flex flex-column justify-content-center align-items-start m-0">
                        <p class="m-0 p-0">Retiro GRATIS por sucursal</p>
                        <a href="#">Ver sucursales</a>
                    </div>
                </div>
            </div>

            @auth
            <div class="contenedor-btn-comprar">
                <a href="{{route('finalizarcompra')}}">
                    <button class="btn-comprar btn w-100">Comprar</button>
                </a>
            </div>

            <div class="contenedor-btn-comprar">
                <form action="{{route('finalizarcompra')}}" method="post">
                    <input type="hidden" name="nombre_producto" id="nombre_producto" value="{{$producto->nombre_producto}}">
                    

                    <button class="btn-comprar btn w-100">Comprar</button>
                </form>
            </div>

            @else
                <div class="contenedor-comprar">
                    <div class="titulo-subtitulo">
                        <h4>¿Queres comprar?</h4>
                        <a href="http://localhost:8000/inicioSesion"><p>Inicia sesión</p></a>
                    </div>

                    <div class="titulo-subtitulo">
                        <p>¿No tenes cuenta? <a href="http://localhost:8000/crearCuenta">¡Registrate!</a></p>
                    </div>
                    
                </div>
            @endauth
          
            
        </div>
    </div>
    <div class="container contenedor-descripcion">
        <h1>Descripcion:</h1>
        <p>{!! nl2br(e($producto->descripcion_producto)) !!}</p> 
    </div>

    <div class="contenedor-comentarios">
        <h1>Comentarios:</h1>
        <div class="contenedor-mensajes">
            
            @forelse($producto->comentarios->where('id_padre', null) as $comentario)

                <div class="container-comentarios-gral">
                    <div class="comentario burbuja">
                        <h3 class="header-comentario">{{$comentario->usuario->username}}</h3>
                        <p class="cuerpo-comentario">
                            {{$comentario->descripcion_comentario}}
                        </p>
                    </div>
                    @foreach($comentario->respuestas as $respuesta)
                        <div class="container-rta">
                            <h3 class="header-comentario">{{$respuesta->usuario->username}}</h3>
                            <p class="cuerpo-comentario">
                                {{$respuesta->descripcion_comentario}}
                            </p>
                        </div>

                    @endforeach
                    @php
                        $ya_respondio = $comentario->respuestas->where('usuario_id', Auth::id())->isNotEmpty();

                    @endphp

                
                    <div class="contenedor-agregar-comentario">
                        @auth
                        @if(!$ya_respondio && $comentario->usuario_id != Auth::id())
                        <form action="{{ url('/producto/' . $comentario->producto_id . '/respuesta') }}" method="post">
                            @csrf
                            <textarea name="respuesta_comentario" id="respuesta_comentario"  placeholder="Escriba una respuesta..."></textarea>
                            @error('respuesta_comentario')
                            <div class="error_form">{{$message}}</div>
                            @enderror
                            <input type="text" style="display: none" value="{{$comentario->id_comentario}}" name="id_padre">
                            <input type="text" style="display: none" value="{{$comentario->producto_id}}" name="id_producto">

                            <button type="submit">Responder</button>
                        </form>
                    
                        @else
                           

                        @endif
                        @endauth
                    
                    </div>
                </div>
                
                    
                    @empty
                    <p class="aviso-sin-comentario">No hay comentarios aún. ¡Sé el primero en comentar!</p>
            @endforelse

            @auth
                <div class="contenedor-agregar-comentario">
                    <form action="{{ url('/producto/' . $producto->id_producto . '/comentario') }}" method="post">
                        @csrf
                        <textarea name="descripcion_comentario" id="descripcion_comentario"  placeholder="Escriba un comentario..."></textarea>
                        @error('descripcion_comentario')
                        <div class="error_form">{{$message}}</div>
                        @enderror
                        <input type="text" style="display: none" value="{{$producto->id_producto}}" name="id_producto">
                        <button type="submit">Agregar Comentario</button>
                    </form>
                    
                </div>
            @else
                <div class="contenedor-inicia-sesion">
                    <div class="titulo-subtitulo">
                        <h4>¿Queres dejar un comentario?</h4>
                        <a href="http://localhost:8000/inicioSesion"><p>Inicia sesión</p></a>
                    </div>

                    <div class="titulo-subtitulo">
                        <p>¿No tenes cuenta? <a href="http://localhost:8000/crearCuenta">¡Registrate!</a></p>
                    </div>
                    
                </div>
            @endauth

           
            
        </div>

        
        
    </div>
    
    


@include('footer')
