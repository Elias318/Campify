@include ('header');
<body>
    
    
      
        <div class="container_form_agregar_producto">
            
            <h2 class="titulo_form">Editar: {{$producto->nombre_producto}}</h2>

            <form class="form_agregar_producto" action="/producto/{{$producto->id_producto}}" method="post" enctype="multipart/form-data">

                @csrf
                @method("PUT")
                <div class="mb-3">

                  <label for="nombre_producto" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{old('nombre_producto',$producto->nombre_producto)}}">
                    @error('nombre')
                    <div class="error_form">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
    
                    <label for="precio_producto" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio_producto" name="precio_producto" value="{{old('precio_producto',$producto->precio_producto)}}">
                   
                    @error('precio_producto')
                    <div class="error_form">{{$message}}</div>
                @enderror
                </div>
    
                <div class="mb-3">
    
                    <label for="stock_producto" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock_producto" name="stock_producto" value="{{old('stock_producto',$producto->stock_producto)}}">
                    @error('stock_producto')
                    <div class="error_form">{{$message}}</div>
                @enderror
                    
                </div>
                <div class="mb-3">
    
                    <label for="descripcion_producto" class="form-label">Descripcion</label>
                    <textarea name="descripcion_producto" id="descripcion_producto" cols="30" rows="10" class="form-control" >{{ old('descripcion_producto', $producto->descripcion_producto) }}</textarea>

                    @error('descripcion_producto')
                    <div class="error_form">{{$message}}</div>
                    @enderror
                    
                </div>

                <div class="mb-3">
                    <label for="categoria_id" class="form-label">Selecciona una opción:</label>
                    <select id="categoria_id" name="categoria_id" class="form-control" >
                        <option value="" @selected($producto->categoria_id =="")>--Seleccionar una opcion--</option>
                        <option value="1" @selected($producto->categoria_id == 1)>Campamento</option>
                        <option value="2" @selected($producto->categoria_id == 2)>Reposeras y sombrillas</option>
                        <option value="3" @selected($producto->categoria_id == 3)>Accesorios para bicicletas</option>
                        <option value="4" @selected($producto->categoria_id == 4)>Travel</option>
                        <option value="5" @selected($producto->categoria_id == 5)>Accesorios para vehiculos</option>
                        <option value="6" @selected($producto->categoria_id == 6)>Hogar y herramientas</option>
                    </select>
                    @error('categoria_id')
                    <div class="error_form">{{$message}}</div>
                    @enderror
                </div>
                

                <div class="mb-3">
    
                    <label for="imagen_producto" class="form-label">Imagen Principal</label>
                    <input type="file" class="form-control" id="imagen_producto" name="imagen_producto">
                    @error('imagen_producto')
                    <div class="error_form">{{$message}}</div>
                    @enderror
                    
                </div>
                  
            
                
                <button type="submit" class="btn btn-primary btn_form">Actualizar</button>
              </form>
        </div>
        
    
    
</body>


@include('footer');
