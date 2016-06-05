@extends('layouts.backend')

@section('konten')
 

<div class="col-md-12">


	<h2>
		<i class="fa fa-th-list"></i> Transaksi Saya - 
		@if(Request::get('filterTgl')) 
			{!! fungsi()->date_to_tgl(Request::get('filterTgl')) !!}
		@else
			hari ini
		@endif
	</h2>
	<hr>
	@include($base_view.'komponen.filter')
	@include($base_view.'list_data')
 
</div>


 
@endsection
