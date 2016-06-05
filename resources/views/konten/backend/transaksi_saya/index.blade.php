@extends('layouts.backend')

@section('konten')
 

<div class="col-md-12">
	<h2>
		<i class="fa fa-th-list"></i> Transaksi Saya - hari ini
	</h2>
	<hr>
	@include($base_view.'list_data')
 
</div>


 
@endsection
