<table class="table table-bordered table-hover">
	<thead>
		<tr class="alert-info">
			<th rowspan="2" width="50px" class="text-center">No.</th>
			<th rowspan="2" class="text-center">Keterangan</th>
			<th width="200px" rowspan="2" class="text-center">Waktu</th>
			<th colspan="3" class="text-center" >Stok</th>
		</tr>
		<tr class="alert-info">
			<th width="80px" class="text-center"> Masuk</th>
			<th width="80px" class="text-center"> Keluar</th>
			<th width="80px" class="text-center">Sisa </th>
		</tr>
	</thead>
	<tbody>

	<?php $no = $stok->firstItem(); ?>

	@foreach($stok as $list)
		<tr>
			<td class="text-center">
				{!! $no !!}
			</td>
			<td class="text-center">
				{!! $list->keterangan !!}
			</td>
			<td class="text-center">
				{!! fungsi()->date_to_tgl(date('Y-m-d', strtotime($list->created_at))) !!} - 
				{!! date('H:i', strtotime($list->created_at)).' WIB' !!}
			</td>


			<td class="text-center">
				{!! $list->stok_masuk !!}
			</td>
			<td class="text-center">
				{!! $list->stok_keluar !!}
			</td>
			<td class="text-center">
				{!! $list->stok_sisa !!}
			</td>
		</tr>
		<?php $no++ ?>
	@endforeach
	</tbody>
</table>


{!! $stok->render() !!}