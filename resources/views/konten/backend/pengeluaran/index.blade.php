@extends('layouts.backend')

@section('konten')
 




 	@include($base_view.'komponen.tombol_create')

	<h2>
		<i class="fa fa-tags"></i> Pengeluaran  

		@if(Request::get('getByBln')) 
			Bulan {!! fungsi()->bulan2(Request::get('getByBln')) !!}
		@elseif(Request::get('getByTgl'))
			Tanggal {!! fungsi()->date_to_tgl(Request::get('getByTgl'))  !!}
		@else 
			Hari Ini
		@endif
	</h2>
 


	<hr>
	@include($base_view.'komponen.filter_pengeluaran')


	@include($base_view.'list_data')

 

 
@endsection
