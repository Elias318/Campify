@include('header')

@if (session('success'))
  <div class="container d-flex justify-content-center text-center"></div>
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  </div>
@endif

@if (session('error'))
  <div class="container d-flex justify-content-center text-center"></div>
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  </div>
@endif

<!-- Banner gigante -->
<div class = 'trabajaConNosotros mb-5'>
    <div class="filtroBorroso d-flex justify-content-evenly align-items-center">
            <div class="vectorIzq position-relative me-5 d-flex justify-content-center align-items-center">
                <img class="vecTam opacity-75 ms-2 position-absolute" src="images/sobreNosotros/vector1.png" alt="vector" />
                <img class="vecTam opacity-50 me-4 position-absolute" src="images/sobreNosotros/vector1.png" alt="vector" />    
            </div>
            <div class="vectorDer position-relative ms-5 d-flex justify-content-center align-items-center">
                <img class="vecTam opacity-75 ms-2 position-absolute" src="images/sobreNosotros/vector2.png" alt="vector" />
                <img class="vecTam opacity-50 me-4 position-absolute" src="images/sobreNosotros/vector2.png" alt="vector" />    
            </div>

        <h1 class="text-white fs-1 position-absolute text-shadow">Trabaja con Nosotros</h1> 
    </div>
</div>

<!-- Texto -->
<div class="container d-flex justify-content-center text-center mt-5">
    <p class="lead text-muted" style="font-family: 'Arial', sans-serif;">
      En Campify, creemos en el talento joven y en el poder de las nuevas ideas. Si estás estudiando y querés adquirir experiencia laboral en un ambiente dinámico y en constante crecimiento, 
      este es el lugar para vos. 
      <span class="font-weight-bold negrita">¡Dejanos tu CV y descubrí cómo podés dar tus primeros pasos profesionales con nosotros! ¡Te esperamos!</span>
    </p>
</div>


<!-- FORM -->
<!--
<div class="container mt-5 mb-5">
    <form action="" method="POST">
        <div class="row ">
          <div class="col-md-6">
            <label for="nombre" class="form-label text-white">Nombre</label>
            <input type="text" class="form-control color-fondo tamanio" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
          </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary boton-enviar">Enviar</button>
        </div>
    </form>
</div>
-->

<!-- Form 2 -->
<div class="container container_form_agregar_producto mb-5 mt-5">
  <h2 class="titulo_form">AGREGA TUS DATOS</h2>

  <form class="form_agregar_producto" action="{{ route('enviar.formulario') }}" method="POST" enctype="multipart/form-data">

      @csrf
      <div class="mb-3">
          
        <label for="nombre_postulado" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre_postulado" name="nombre_postulado" value="{{old('nombre_postulado')}}">
          @error('nombre_postulado')
          <div class="error_form">{{$message}}</div>
          @enderror
      </div>

      <div class="mb-3">

          <label for="apellido_postulado" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="apellido_postulado" name="apellido_postulado" value="{{old('apellido_postulado')}}">
         
          @error('apellido_postulado')
          <div class="error_form">{{$message}}</div>
          @enderror
      </div>

      <div class="mb-3">

          <label for="email_postulado" class="form-label">Email</label>
          <input type="text" class="form-control" id="email_postulado" name="email_postulado" value="{{old('email_postulado')}}">
          @error('email_postulado')
          <div class="error_form">{{$message}}</div>
          @enderror
          
      </div>
      <div class="mb-3">

          <label for="telefono_postulado" class="form-label">Celular</label>
          <input type="text" class="form-control" id="telefono_postulado" name="telefono_postulado" value="{{old('telefono_postulado')}}">
          @error('telefono_postulado')
          <div class="error_form">{{$message}}</div>
          @enderror
          
      </div>


      <div class="mb-3">
          <label for="puesto_solicitado" class="form-label">Selecciona una opción:</label>
          <select id="puesto_solicitado" name="puesto_solicitado" class="form-control">
              <option value="">--Seleccionar una opcion--</option>
              <option value="1">Sistemas</option>
              <option value="2">Reponedor</option>
              <option value="3">Caja</option>
              <option value="4">Marketing</option>
              <option value="5">Seguridad</option>

          </select>
          @error('puesto_solicitado')
          <div class="error_form">{{$message}}</div>
          @enderror
      </div>
      

      <div class="mb-3">

          <label for="cv" class="form-label">Subir CV</label>
          <input type="file" class="form-control" id="cv" name="cv">
          @error('cv')
          <div class="error_form">{{$message}}</div>
          @enderror
          
      </div>
        
  
      
      <button type="submit" class="btn btn-primary btn_form boton-enviar">Cargar Datos</button>
    </form>

</div>
    
@include('footer')
