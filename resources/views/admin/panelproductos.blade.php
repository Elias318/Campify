@include ('header');

<body>
    @if(session()->has('success'))
            <div class="alert alert-success text-center">{{session("success")}}</div>
        

        @endif
    <div id="" class="carrito-container container-fluid w-correccionMegustas my-5">
        <div class="row border bg-light pt-2 pb-2 header-tabla">
            <div class="col-2 px-2 text-center">Producto</div>
            <div class="col-2 px-2 text-center">Titulo</div>
            <div class="col-2 px-2 text-center">Categoria</div>
            <div class="col-2 px-2 text-center">Cantidad</div>
            <div class="col-2 px-2 text-center">Precio</div>
           
            <div class="col-2 px-2 text-center">Acciones</div>
        </div>
        @foreach($productos as $producto)
            <div class="row border align-items-center pt-2 pb-2" id="{{$producto->id_producto  }}">
                <div class="col-2 text-center">
                    <img class=" img-producto-tabla" src="data:image/jpeg;base64,{{ $producto->imagen_producto }}" alt="Imagen del producto">
                </div>
                
                <div class="col-2 text-center">{{ $producto->nombre_producto }}</div>
                <div class="col-2 text-center">{{ $producto->categoria->nombre_categoria }}</div>

                <div class="col-2 text-center d-flex justify-content-center align-items-center gap-2">{{ $producto->stock_producto }}</div>
                <div class="col-2 text-center precio-producto">${{ $producto->precio_producto }}</div>
               
                <div class="col-2 text-center  d-flex justify-content-center align-items-center gap-4">
                    <a class="btn-accion" href="/producto/{{$producto->id_producto}}/edit"><i class="fa fa-edit"></i> </a>
                    <form action="/producto/{{$producto->id_producto}}" method="post">
                        @csrf
                        @method("DELETE")

                        <button class="btn-accion"><i class="fa fa-trash"></i></button>
                    </form>
                    
                    

                </div>
                
            </div>
        @endforeach
        <div class=" pt-4 d-flex justify-content-center align-items-center ">
            <a href="{{route('agregarproducto')}}" class="btn btn-primary btn_form">Agregar producto</a>
        </div>

    </div>

    

</body>
@include('footer');
