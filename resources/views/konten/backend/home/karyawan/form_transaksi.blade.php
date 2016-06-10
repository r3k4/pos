<div class="col-md-10">

			<div class="form-group">
				{!! Form::text('kode_barang', '', ['id' => 'kode_barang', 
												   'class' => 'form-control', 
												   'placeholder' => 'kode barang...',
												   'style'		=> 'font-size:25px;height:40px;',
												   'autofocus'
												   ]) !!}
			</div> 
 	
</div>

<div class="col-md-2">
	<button id="tombol_cari_produk" style="font-size:20px;height:40px; width: 100%" class="btn btn-info">
		<i class="fa fa-search"></i>
	</button>
</div>

 

<div class="col-md-12">
	<div id="list_pembelian">		 
		@include($base_view.'karyawan.list_pembelian')
	</div>
</div>



@include($base_view.'karyawan.script_form_transaksi')

