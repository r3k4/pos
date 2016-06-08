@extends('layouts.backend')

@section('konten')
 
 
 	@include($base_view.'komponen.tombol_simpan')
	<h2>
		<i class="fa fa-cogs"></i> Konfigurasi  
	</h2>
	<hr>
 
 	@include($base_view.'form_config')
 	@include($base_view.'script_simpan')

 
@endsection
