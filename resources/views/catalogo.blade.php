@include('header')

<div class="container text-center">
    <div class="row">
        <!-- Contenedor de Filtros -->
        <div class="col-12 col-md-2 d-flex flex-column gap-3 filtro">
            <h2 class=" fw-bold border-bottom fs-4">Filtrar por:</h2>
            <form action="{{ route('catalogo') }}" method="GET"">
                @csrf
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="categorias[]" value="Campamentos"
                           {{ in_array('Campamento', request()->input('categorias', [])) ? 'checked' : '' }}>
                    <span class="form-check-label">CAMPAMENTOS</span>
                </label>
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="categorias[]" value="Accesorios para bicicletas"
                           {{ in_array('Accesorios para bicicletas', request()->input('categorias', [])) ? 'checked' : '' }}>
                    <span class="form-check-label">ACCESORIOS PARA BICICLETAS</span>
                </label>
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="categorias[]" value="Reposeras y sombrillas"
                           {{ in_array('Reposeras y sombrillas', request()->input('categorias', [])) ? 'checked' : '' }}>
                    <span class="form-check-label">REPOSERAS Y SOMBRILLAS</span>
                </label>
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="categorias[]" value="Accesorios para vehiculos"
                           {{ in_array('Accesorios para vehiculos', request()->input('categorias', [])) ? 'checked' : '' }}>
                    <span class="form-check-label">ACCESORIOS PARA VEHICULOS</span>
                </label>
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="categorias[]" value="Hogar y Herramientas"
                           {{ in_array('Hogar y Herramientas', request()->input('categorias', [])) ? 'checked' : '' }}>
                    <span class="form-check-label">HOGAR Y HERRAMIENTAS</span>
                </label>
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="categorias[]" value="Travel"
                           {{ in_array('Travel', request()->input('categorias', [])) ? 'checked' : '' }}>
                    <span class="form-check-label">TRAVEL</span>
                </label>
                

                <button type="submit" class="btn btn-primary mt-4 btn-filtros">Aplicar Filtros</button>
            </form>
        </div>

        <!-- Contenedor de Productos -->
        <div class="col-12 col-md-10 productos-container d-flex flex-column justify-content-center align-items-center gap-10">
            <h1 class=" fw-bold my-4 border-bottom pb-2 productos-titulo fs-2"></h1>
            <!-- Fila de Tarjetas -->
            <div class="row container_tarjetas pt-4">
                @foreach ($productos as $producto)
                
                    
                
                        <div class="tarjeta-producto">
                            <img src="{{ asset('storage/' . $producto->imagen_producto) }}" alt="Imagen del producto">
                            <div class="container_datos_tarjeta">
                                <h3>{{$producto->nombre_producto}}</h3>
                                <p>{{$producto->categoria->nombre_categoria}}</p>
                                <p>{{$producto->descripcion_producto}}</p>
                                <p>
                                    ${{$producto->precio_producto}}
                                </p>
                                <div class="d-flex justify-content-evenly align-items-center gap-3">
                                    <div class="botonMeGusta">
                                        <button data-producto-id="{{ $producto->id_producto }}" 
                                                class="btn_meGusta d-flex justify-content-center align-items-center {{ $producto->meGustas->contains('usuario_id', auth()->id()) ? 'active' : '' }}">
                                            <i class="fa-solid fa-heart"></i>
                                        </button>
                                    </div>                                    
                                    <div class="container_btn_tarjeta">
                                        <a href="{{route('producto.vistaProducto', $producto->id_producto)}}" class="btn_comprar">Ver</a>
                                    </div>
                                    <div class="botonMeGusta">
                                        <form class="formAgregarProducto" method="POST" action="{{route('carrito.agregar', $producto->id_producto)}}">
                                            @csrf
                                            <input type="text" name="id_producto" id="{{$producto->id_producto}}" style="display: none">
                                            <button
                                                type="submit"
                                                data-producto-id="{{ $producto->id_producto }}"
                                                class="btn_Carrito d-flex justify-content-center align-items-center animacion-carrito">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </button>
                                        </form>
                                    </div>                                    
                                </div> 
                            </div>
                        </div>
                        
                
                @endforeach
            </div>
        </div>
    </div>
</div>




@include('footer')

<script>
    document.querySelectorAll(".btn_Carrito").forEach((btn) => {
        btn.addEventListener("click", function () {
            // Agregar clase de animación
            this.classList.add("active");
        });
    });
</script>