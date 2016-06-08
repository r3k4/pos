@extends('layouts.frontend')

@section('konten')
<div class="container">


    <div class="row">
        <div class="col-md-8">
            <h1 style="font-family: 'Varela Round', sans-serif; font-size: 40px;">
                <i class='fa fa-shopping-cart'></i> {!! setup_variable('nama_aplikasi') !!}
            </h1>
            <hr>
            <p style="font-family: 'Varela Round', sans-serif; font-size: 20px;">
                <b style='font-weight:bolder;'>Sistem Informasi Penjualan</b>  adalah sub sistem informasi bisnis 
                yang mencakup kumpulan prosedure yang melaksanakan, mencatat, mengkalkulasi, 
                membuat dokumen dan informasi penjualan untuk keperluan manajemen 
                dan bagian lain yang berkepentingan.                
            </p>

        </div>
        <div class="col-md-4" style="margin-top:5em;" >
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    @include($base_view.'login.form_login')      
                </div>
            </div>
        </div>



    </div> {{-- row --}}
    


</div>
@endsection
