
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('inicio') }}">Teatro de la ciudad</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

          <li><a  class="nav-link active" href="{{ route('inicio') }}">Inicio</a></li>

          @if( Auth::check() )
                
            <li><a  class="nav-link active" href="{{ route('reservaSala') }}">Hacer reserva</a></li>
            <li><a  class="nav-link active" href="{{ route('verMiReserva') }}">Mis reservas</a></li>
            <li><a  class="nav-link active" href="{{ route('verPerfil') }}">Mis datos</a></li>
            <li><a  class="nav-link active" href="{{ route('cerrarSesion') }}">Salir</a></li>
            <li>
              <a class="nav-link active" href="#">
                Estas loguead@:( {{ Auth::user()->nombre_apellido }} )
              </a>
            </li>             



          @else

            <li><a class="nav-link active" href="{{ route('acceder') }}">Iniciar sesión</a></li>

          @endif

      </ul>
    </div>
  </div>
</nav>