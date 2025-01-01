@include('header')

@if (session()->has("success"))
<div class="">
  <div class="alert alert-success mb-0 text-center py-1"> {{ session("success") }} </div>
</div>
@endif
@error('fail')
<div class="alert alert-danger mb-0 text-center py-1"> {{$message}} </div>
@enderror

<div class="login-container">
    <div class="logo-container vertical-center">
      <img src="images/logosinbg.png" alt="">
    </div>
    <div class="vertical-center text-center">
      <div class="container ajuste-sesion">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <form action=" {{ route('login') }} " method="POST" >
              @csrf  

              <img class="mb-4 w-imagen-inicio" src="images/logosinbg.png">
              <h1 class="h3 mb-3 fw-normal">¡Inicia de sesión!</h1>
  
              <div class="form-floating ">
                <input name="loginUsername" type="text" class="form-control borde-form-sesion" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Correo electronico / Nombre</label>
              </div>
              <div class="form-floating mt-1">
                <input name="loginPassword" type="password" class="form-control borde-form-sesion" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Contraseña</label>
              </div>
              <button class="w-100 btn btn-lg mt-3 fs-5 color-fondo" type="submit">Iniciar sesión</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@include('footer')