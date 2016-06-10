@extends('layouts.backend')

@section('konten')
 


<div class="col-md-12">
	@include($base_view.'komponen.tombol_create')
	<h2>
		<i class="fa fa-sitemap"></i> Cabang 
	</h2>
	<hr>

	@include($base_view.'list_data')



</div>


 
@endsection
