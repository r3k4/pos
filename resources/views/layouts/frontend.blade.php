<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('NAMA_APP', 'TKASIR') }}</title>

    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
      <script src="{{ elixir('js/app.js') }}"></script>
    </head>
<body>
    @include('layouts.komponen.default.nav_atas')
    @include('layouts.komponen.default.modal')




    <div class="container">  
        <div class="row">

          @yield('konten')

        </div>
    </div>

 
    
        @include('layouts.komponen.default.footer')

    
 
  <script type="text/javascript">
  new WOW().init();
  </script>     
</body>
</html>
