@extends('layouts.backend')

@section('konten')
  
<div class="col-md-12" >




    <h3>
    	<i class="fa fa-home"></i> Dashboard
    </h3>
    <hr>
    <div class="row">
        <div class="col-md-12">
{{--         	{!! Cart::content() !!} 
 --}}          @include($base_view.'karyawan.form_transaksi')
        </div>
    </div>

</div>


 
@endsection
