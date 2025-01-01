@include('header')

<div class="login-container">
    <div class="logo-container vertical-center">
      <img src="images/logosinbg.png" alt="">
    </div>
    <div class="vertical-center text-center">
      <div class="container ajuste-sesion">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <form action="{{ route('registro') }}" method="POST">
              @csrf

              <img class="mb-4 w-imagen-inicio" src="images/logosinbg.png">
              <h1 class="h3 mb-3 fw-normal">¡Crea tu cuenta!</h1>
              <div class="form-floating borde-form-sesion">
                <input name="username" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{old('username')}}">
                <label for="floatingInput">Nombre de usuario</label>
              </div>
              @error("username")
                <div class="alert alert-danger"> {{$message}} </div>
              @enderror
              <div class="form-floating borde-form-sesion mt-1">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="{{old('email')}}">
                <label for="floatingInput">Correo electronico</label>
              </div>
              @error("email")
              <div class="alert alert-danger"> {{$message}} </div>
              @enderror
              <div class="form-floating borde-form-sesion mt-1">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" value="">
                <label for="floatingPassword">Contraseña</label>
              </div>
              @error("password")
              <div class="alert alert-danger"> {{$message}} </div>
              @enderror
              <div class="form-floating borde-form-sesion mt-1">
                <input name="password_confirmation" type="password" class="form-control" id="floatingPassword" placeholder="Password" value="">
                <label for="floatingPassword">Confirmar la contraseña</label>
              </div>
              <button class="w-100 btn btn-lg mt-3 fs-5 color-fondo" type="submit">Crear cuenta</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

@include('footer')