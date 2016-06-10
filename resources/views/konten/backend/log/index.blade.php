@extends('layouts.backend')

@section('konten')
 
 
 	@include($base_view.'komponen.tombol_clear_log')
	<h2>
		<i class="fa fa-cubes"></i> Sys Log  
	</h2>
	<hr>
 
	@if(!empty($file))
		@include($base_view.'log_viewer')
	@else
		<div class="alert alert-info">
			<h1>
				Tidak ada log tersedia
			</h1>
		</div>
	@endif



 
@endsection
