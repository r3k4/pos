@extends('layouts.backend')

@section('konten')
 

<div class="col-md-12">

	@include($base_view.'komponen.tombol_export_excel')
	<h2>
		<i class="fa fa-th-list"></i>   Transaksi Karyawan
	</h2>
	<hr>

	@include($base_view.'list_data')
 
    

</div>


 
@endsection
