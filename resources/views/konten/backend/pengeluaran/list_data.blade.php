<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="50px">No.</th>
			<th>Nama Pengeluaran</th>
			<th class="text-center" width="150px">Harga/Biaya</th>
			<th width="90px" class="text-center">Jumlah</th>
			<th class="text-center" width="150px">Subtotal</th>
			<th class="text-center" width="80px">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $pengeluaran->firstItem(); ?>
	@foreach($pengeluaran as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td class="text-center">{!! fungsi()->rupiah($list->biaya) !!}</td>
			<td class="text-center">{!! $list->jumlah !!}</td>
			<td class="text-center">{!! fungsi()->rupiah($list->subtotal_biaya) !!}</td>
			<td class="text-center">
				-
			</td>
		</tr>
		<?php $no++; ?>
	@endforeach
	</tbody>
</table>


{!! $pengeluaran->render() !!}