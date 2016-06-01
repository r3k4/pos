@extends('layouts.backend')

@section('konten')
 




 	@include($base_view.'komponen.tombol_create')

	<h2>
		<i class="fa fa-tags"></i> Pengeluaran hari ini 
	</h2>
 


	<hr>


	@include($base_view.'list_data')

 

 
@endsection
