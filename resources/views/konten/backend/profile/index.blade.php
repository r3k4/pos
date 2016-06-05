@extends('layouts.backend')

@section('konten')
 

<div class="col-md-12">
	@include($base_view.'komponen.tombol_simpan') 	
	<h2>
		<i class="fa fa-wrench"></i> Profile saya 
	</h2>
	<hr>
 	
 	<div class="col-md-3">
		@include($base_view.'form_data_kiri') 		
 	</div>
 	<div class="col-md-3">
		@include($base_view.'form_data_kanan') 	 		
 	</div>


			

 	<div class="col-md-5 col-md-offset-1">
		@include($base_view.'info') 		
 	</div> 	

</div>


 
@endsection
