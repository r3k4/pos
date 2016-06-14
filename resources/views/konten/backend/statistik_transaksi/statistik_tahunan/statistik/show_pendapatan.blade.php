
<h2 class="text-left text-success">
	<i class='fa fa-caret-down'></i> Pendapatan Tahun {!! Request::get('thn') !!}
</h2>


	<table class="table" style="font-size:15px">
		<tr class="text-warning">
			<td width="230px">
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

 

 