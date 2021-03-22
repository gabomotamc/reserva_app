<form action="{{ url('/usuario/logueo') }}" method="POST" >
  @csrf <!-- {{ csrf_field() }} -->
  <div class="form-group">
    <label for="exampleInputEmail1">Correo</label>
    <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar correo">
    <!--
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Clave</label>
    <input type="password" name="clave" class="form-control" id="exampleInputPassword1" placeholder="Ingresar clave">
  </div>
  <!--
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  -->
  <button type="submit" class="btn btn-primary">Entrar</button>
</form>