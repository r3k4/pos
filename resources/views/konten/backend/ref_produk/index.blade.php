@extends('layouts.backend')

@section('konten')
 

@include($base_view.'komponen.tombol_create')
<div class="col-md-12">
	<h2>
		<i class="fa fa-th-list"></i> Jenis Produk 
	</h2>
	<hr>

	@include($base_view.'list_data')

</div>


 
@endsection
