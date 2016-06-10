@extends('layouts.backend')

@section('konten')
 

<div class="col-md-12">
	<h2>
		<i class="fa fa-th-list"></i> Jenis Produk 
	</h2>
	<hr>
@include($base_view.'komponen.tombol_create')
	
@include($base_view_produk.'komponen.nav_atas')

	<hr>

	<div class="col-md-6">
		@include($base_view.'list_data')		
	</div>


</div>


 
@endsection
