@extends('layouts.backend')

@section('konten')
 

<div class="col-md-12">

<i id='loading_filter' class='fa fa-refresh fa-spin pull-right' style='font-size:40px;display:none;'></i>

	<h2>
		<i class="fa fa-bar-chart"></i> Statistik Transaksi 
	</h2>

	<hr>
	@include($base_view.'komponen.pilih_cabang_dan_bulan')

	@if(isset($transaksi))
		@include($base_view.'view_statistik_cabang_bulanan')
 	@else
 		@include($base_view.'landing_page')
 	@endif
    

</div>


 
@endsection
