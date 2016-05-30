<h3>
	<i class='fa fa-eye'></i> lihat produk
</h3>
<hr>


<div class="row">
	
	<div class="col-md-6">
		<table class="table">
			<tr>
				<td width="130px">
					Nama Produk
				</td>
				<td width="10px">:</td>
				<td>
					{!! $produk->nama !!}
				</td>
			</tr>

			<tr>
				<td>
					SKU
				</td>
				<td width="10px">:</td>
				<td>
					{!! $produk->sku !!}
				</td>
			</tr>


			<tr>
				<td>
					Stok Barang
				</td>
				<td width="10px">:</td>
				<td>
					@if($produk->stok_barang == 0)
						<span class='label label-danger'>
							kosong
						</span>
					@else
						<span class='label label-success'>
							{!! $produk->stok_barang.' '.$produk->fk__ref_satuan_produk !!}							
						</span>
					@endif
				</td>
			</tr>

 		</table>
	</div>
	<div class="col-md-6">
		<table class="table">
			<tr>
				<td width="130px">
					Harga Beli
				</td>
				<td width="10px">:</td>
				<td>
					{!! fungsi()->rupiah($produk->harga_beli) !!}
				</td>
			</tr>


			<tr>
				<td>
					Harga Jual
				</td>
				<td width="10px">:</td>
				<td>
					{!! fungsi()->rupiah($produk->harga_jual) !!}
				</td>
			</tr>



			<tr>
				<td>
					Harga Re-seller
				</td>
				<td width="10px">:</td>
				<td>
					{!! fungsi()->rupiah($produk->harga_reseller) !!}
				</td>
			</tr>			
		</table>		
	</div>

	<div class="col-md-12 text-center">
	<hr>

		@if(!empty($produk->barcode))
			{!! str_replace('<?xml version="1.0" standalone="no"?>', '', DNS1D::getBarcodeSVG($produk->barcode, "C128")) !!}
		<br>
		{!! $produk->barcode !!}

		@endif


	</div>	


</div>

