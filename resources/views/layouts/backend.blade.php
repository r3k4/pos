<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ setup_variable('nama_aplikasi') }}</title>

    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
      <script src="{{ elixir('js/app.js') }}"></script>
      
    </head>
<body>


    @include('layouts.komponen.default.nav_atas')
    @include('layouts.komponen.default.modal')

 
    <div class="container" id="app" >  
        <div class="row">

            <div class="col-md-2">
                @include('layouts.komponen.backend.sidebar')
            </div>

            <div class="col-md-10 animated fadeIn">
              @yield('konten')
            </div> 

        </div>
    </div>

 
    
        @include('layouts.komponen.default.footer')

      <script type="text/javascript">
  new WOW().init();
  </script>  
</body>
</html>
