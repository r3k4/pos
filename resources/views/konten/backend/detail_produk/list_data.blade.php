<table class="table">
	<thead>
		<tr>
			<th class="text-center" width="50px">No.</th>
			<th>Nama produk Item</th>
			<th width="120px">Stok</th>
			<th width="100px">Cabang</th>
			<th width="90px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $detail_produk->firstItem(); ?>
		@foreach($detail_produk as $list)
			<tr>
				<td class="text-center">{!! $no !!}</td>
				<td>{!! $list->fk__mst_produk.' - '.$list->nama !!}</td>
				<td>{!! $list->stok_barang !!}</td>
				<td>{!! $list->fk__mst_cabang !!}</td>
				<td class="text-center">
					-
				</td>
			</tr>
			<?php $no++; ?>
		@endforeach
	</tbody>
</table>

{!! $detail_produk->appends(Request::all())->render(); !!}