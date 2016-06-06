<h2 class="text-left">
	<i class='fa fa-money'></i> Pendapatan Bulan {!! fungsi()->bulan2(Request::get('bln')) !!}
</h2>

<div class="col-md-8">
	<table class="table" style="font-size:20px">
		<tr class="text-warning">
			<td width="300px">
				Omzet
			</td>
			<td width="10px">:</td>
			<td>
				{!! fungsi()->rupiah($nominal_transaksi) !!}
			</td>
		</tr>

		<tr class="text-info">
			<td>
				Nominal dari harga beli
			</td>
			<td width="10px">:</td>
			<td>
				{!! fungsi()->rupiah($nominal_harga_beli) !!}
			</td>
		</tr>

		<tr class="text-success">
			<td>
				Profit
			</td>
			<td width="10px">:</td>
			<td>
				{!! fungsi()->rupiah($nominal_transaksi - $nominal_harga_beli) !!}
			</td>
		</tr>


	</table>	
</div>
 

 