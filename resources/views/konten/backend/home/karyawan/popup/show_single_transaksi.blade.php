

<button style="margin-left:1em;" id="cetak" class="btn btn-primary pull-right">
	 <i class='fa fa-print'></i> cetak struk
</button>

<button id="tutup" class="btn btn-primary pull-right">
	 <i class='fa fa-times'></i> close
</button>

  	 <h2>
	 	<i class='fa fa-eye'></i> Detail Transaksi
	 </h2>
 
	 <hr>

	 <h4 class="text-left">
	No Transaksi : {!! $transaksi->no_transaksi !!}	 	
	 </h4>


<table class="table">
	<tr>
		<th style="text-align:center" width="30px">
			No.
		</th>
		<th>
			Nama
		</th>
		<th style="text-align:center" width="40px">
			Qty
		</th>
		<th style="text-align:center" width="70px">
			Harga
		</th>
		<th style="text-align:center" width="70px">
			Total
		</th>
	</tr>
	@php($no=1)
	@foreach($transaksi->mst_penjualan as $list)
		<tr>
			<td style="text-align:center">{!! $no++ !!}</td>
			<td>
				{!! $list->fk__mst_produk !!}
			</td>
			<td style="text-align:center">
				{!! $list->qty !!}
			</td>
			<td style="text-align:center">
				{!! number_format($list->harga_produk) !!}
			</td>
			<td style="text-align:center">
				{!! number_format($list->subtotal_uang_diterima) !!}
			</td>
		</tr>
	@endforeach
</table>


<table class="table" style="font-size:20px;font-weight:bold;">
	<tr>
		<td width="200px">
			Total---{!! $transaksi->fk__total_item !!} item(s).
		</td>
		<td>
			{!! number_format($transaksi->subtotal_pembayaran) !!}
		</td>
	</tr>
	<tr>
		<td>
			Tunai
		</td>
		<td>
			{!! number_format($transaksi->bayar) !!}
		</td>
	</tr>
	<tr>
		<td>
			Kembali
		</td>
		<td>
			{!! number_format($transaksi->nominal_kembalian) !!}
		</td>
	</tr>

</table>
 

 <script type="text/javascript">

 $('#myModal').on('hidden.bs.modal', function (e) {
  $('#myModal').removeData('bs.modal');
})

 $('#tutup').click(function(){
 	$('#myModal').modal('hide');
 });

$('#cetak').click(function(){
				 window.open("{!! route('backend_home.cetak_struk_pembelian', $transaksi->id) !!}", 
			 			"_blank", 
			 			"scrollbars=1,resizable=1,height=400,width=450"
			 		);
});

 </script>