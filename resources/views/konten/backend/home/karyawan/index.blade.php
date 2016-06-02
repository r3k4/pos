@extends('layouts.backend')

@section('konten')
 


<div class="col-md-12" >

 
        <h1>
        	<i class="fa fa-home"></i> Dashboard
        </h1>
        <hr>

 


        <div class="row">
            <div class="col-md-8">
              @include($base_view.'karyawan.form_transaksi')
            </div>            


            <div class="col-md-4">  
              @include($base_view.'karyawan.info')
            </div> 
        </div>
        


</div>


 
@endsection
