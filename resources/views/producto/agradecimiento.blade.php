@include ('header');
<body>
    <div class="container-gral-resumen-compra">
        <h1>¡Gracias por su compra!</h1>
       
        <div class="container-datos-gral">
            <div class="container-datos-factura">
                <h3>Datos de la compra:</h3>
                <p><strong>Nombre:</strong> {{ $datosComprador['nombre_factura'] }}</p>
                <p><strong>Apellido:</strong> {{ $datosComprador['apellido_factura'] }}</p>
                <p><strong>Email:</strong> {{ $datosComprador['email_factura'] }}</p>
                <p><strong>Teléfono:</strong> {{ $datosComprador['telefono_factura'] }}</p>
                <p><strong>Dirección:</strong> {{ $datosComprador['direccion_factura'] }}</p>
            </div>
        
            <div class="container-datos-factura">
                <h3>Productos en el carrito:</h3>
                @php
                    $totalPrecio = 0;
                @endphp
                @foreach($productosEnCarrito as $item)
                    <div class="datos-carrito-factura">
                        <p><strong>Producto:</strong> {{ $item['producto']->nombre_producto }}</p>
                        <p><strong>Cantidad:</strong> {{ $item['cantidad'] }}</p>
                        <p><strong>Precio:</strong> ${{ $item['producto']->precio_producto }}</p>
                    </div>
                    @php
                        $totalPrecio += $item['producto']->precio_producto * $item['cantidad'];
                    @endphp
                @endforeach
                <div>
                    <p><strong>Total:</strong> ${{ $totalPrecio }}</p>
                </div>
    
                
             
            </div>
            
        </div>
        <div class="container-btn-finalizar-compra">
            <a href="{{route ('/')}}" class="btn btn-primary btn_form boton-enviar">Volver a inicio</a>
        </div>
    </div>
    
</body>


    
@include('footer');


