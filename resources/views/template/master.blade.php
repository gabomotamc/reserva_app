@include('template.head')

@include('template.nav')
    @show

    <div class="container">
      <!--<div class="starter-template">-->

        @yield('content')
        
      <!--</div>-->

      <hr>
      <footer>
        <p>&copy; 2021 Teatro de la ciudad.</p>
      </footer>     
    </div><!-- /.container -->

@include('template.footer')