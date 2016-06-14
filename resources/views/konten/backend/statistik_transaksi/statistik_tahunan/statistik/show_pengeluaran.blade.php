
<h2 class="text-left text-danger">
	<i class='fa fa-caret-up'></i> Pengeluaran Tahun {!! Request::get('thn') !!}
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

		<tr class="text-danger">
			<td>
				Pengeluaran
			</td>
			<td width="10px">:</td>
			<td>
				{!! fungsi()->rupiah($pengeluaran) !!}
			</td>
		</tr>


			<?php 
			$keuntungan = $nominal_transaksi - $pengeluaran;
			?>

		<tr 
		@if($keuntungan > 0)
		class="text-success"
		@else 
		class="text-danger"
		@endif
		>
			<td>
				Keuntungan 
				<i class='fa fa-question-circle' data-toggle='tooltip' title='keuntungan = Omzet - Pengeluaran'></i>
			</td>
			<td width="10px">:</td>
			<td>

		@if($keuntungan > 0)
		<i class='fa fa-caret-up'></i>
		@else 
		<i class='fa fa-caret-down'></i>
		@endif

				{!! fungsi()->rupiah($keuntungan) !!}

			</td>
		</tr>


	</table>	

 

 