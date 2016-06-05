<div class="row">


	@if(Cart::count() != 0 )
		<hr>

		<div class="col-md-8">
			<div class="col-md-12">
			<hr>			
			</div>
 			@include($base_view.'karyawan.list_pembelian.list_data')
			<div class="col-md-12">
				<h3 style="text-decoration:underline" class="text-right">
					Total : {!! fungsi()->rupiah(Cart::total()) !!}
				</h3>
			</div>	
		</div>
		<div class="col-md-4">
			@include($base_view.'karyawan.komponen.tombol_proses_pesanan')
			@include($base_view.'karyawan.komponen.tombol_clear_pesanan')	
			<hr>
		
			@include($base_view.'karyawan.list_pembelian.form_input_pembayaran')
		</div>

	@else
		
		<div class="col-md-6">
			<div class="alert alert-info">
				<h3>Pesanan masih kosong</h3>
			</div>		
		</div>
			
		
	@endif

</div>