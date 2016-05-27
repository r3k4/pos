@extends('layouts.backend')

@section('konten')
 

  <link href="/plugins/bootstrap-select2/dist/css/select2.min.css" rel="stylesheet">
  <script src="/plugins/bootstrap-select2/dist/js/select2.min.js"></script>
  
	
	<h2>
		<i class="fa fa-plus-square"></i> Tambah Item Produk 
	</h2>
	<hr>




<button style="margin-left:1em;" id='simpan' class='btn btn-primary pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>

<a href="{!! route('backend_detail_produk.index') !!}" class="btn btn-primary pull-right">
	<i class='fa fa-arrow-left'></i> Back
</a>
 	 

  	@include($base_view_produk.'komponen.nav_atas')
	<hr>

	
		@include($base_view.'create.form_create')		
		@include($base_view.'create.script')		
	 



 
@endsection
