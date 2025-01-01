@include ('header');

    <body>

        <div class="container-finalizar-compra">
            <div class="container-form-factura">
                <form class="form_agregar_producto" action="{{ route('finalizarcompra.agradecimiento') }}" method="POST" id="form_factura">
    
                    @csrf
                    <div class="mb-3">
                        
                      <label for="nombre_factura" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="nombre_factura" name="nombre_factura" value="{{old('nombre_factura')}}">
                        @error('nombre_factura')
                        <div class="error_form">{{$message}}</div>
                        @enderror
                    </div>
              
                    <div class="mb-3">
              
                        <label for="apellido_factura" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido_factura" name="apellido_factura" value="{{old('apellido_factura')}}">
                       
                        @error('apellido_factura')
                        <div class="error_form">{{$message}}</div>
                        @enderror
                    </div>
              
                    <div class="mb-3">
              
                        <label for="email_factura" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email_factura" name="email_factura" value="{{old('email_factura')}}">
                        @error('email_factura')
                        <div class="error_form">{{$message}}</div>
                        @enderror
                        
                    </div>
                    <div class="mb-3">
              
                        <label for="telefono_factura" class="form-label">Celular</label>
                        <input type="number" class="form-control" id="telefono_factura" name="telefono_factura" value="{{old('telefono_factura')}}">
                        @error('telefono_factura')
                        <div class="error_form">{{$message}}</div>
                        @enderror
                        
                    </div>

                     <div class="mb-3">
              
                        <label for="direccion_factura" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="direccion_factura" name="direccion_factura" value="{{old('direccion_factura')}}">
                        @error('direccion_factura')
                        <div class="error_form">{{$message}}</div>
                        @enderror
                        
                    </div>
              
                    
                  </form>
    
                
            </div>
    
            <div class="container-tabla-carrito">
                
                    <div class="row border bg-light pt-2 pb-2">
                        <div class="col-3 px-2 text-center">Producto</div>
                        <div class="col-3 px-2 text-center">Cantidad</div>
                        <div class="col-3 px-2 text-center">Precio</div>
                        <div class="col-3 px-2 text-center">Total</div> 
                        
                    </div>
                    @foreach($productosEnCarrito as $item)
                        <div class="row border align-items-center pt-2 pb-2" id="producto-{{ $item['producto']->id_producto }}">
                            <div class="col-3 text-center">{{ $item['producto']->nombre_producto }}</div>
                            <div class="col-3 text-center d-flex justify-content-center align-items-center gap-2">
                                <p style="width:10px; margin:0px;" class="">{{ $item['cantidad'] }}</p>
                                
                            </div>
                            <div class="col-3 text-center precio-producto">${{ $item['producto']->precio_producto }}</div>
                            <div class="col-3 text-center total-producto">${{ $item['producto']->precio_producto * $item['cantidad'] }}</div>
                            
                        </div>
                        
                    @endforeach

                    <div class="row border bg-light pt-2 pb-2" id="fila-total">
                        <div class="col-9 text-right font-weight-bold">Total General:</div>
                        <div class="col-2 text-center" id="total-general">$0</div>
                        <div class="col-1"></div>
                    </div>

                    <div class="container-btn-finalizar-compra">
                        <button type="submit" class="btn btn-primary btn_form boton-enviar" form="form_factura">Finalizar compra</button>
                    </div>
                    
            </div>
            
            
        </div>
        



    </body>

@include('footer');