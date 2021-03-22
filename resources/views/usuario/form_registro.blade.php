<form action="{{ url('/usuario/crear') }}" method="POST" >
  @csrf <!-- {{ csrf_field() }} -->
  <div class="form-group">
    <label for="exampleInputEmail1">Correo</label>
    <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su correo" required="required">

    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Clave</label>
    <input type="password" name="clave" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su clave" required="required">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Nombre y apellido</label>
    <input type="text" name="nombre_apellido" class="form-control" id="exampleInputPassword1" placeholder="Nombre y apellido" required="required">
  </div>

  <!--<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  -->

  <button type="submit" class="btn btn-primary">Registrarme</button>
</form>