<table class="table">
	<thead>
		<tr>
			<th class="text-center" width="50px">No.</th>
			<th width="120px">SKU</th>
			<th>Nama produk Item</th>
			<th width="70px" class="text-center">Stok</th>
			<th class="text-center" width="70px">Cabang</th>
			<th width="90px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $detail_produk->firstItem(); ?>
		@foreach($detail_produk as $list)
			<tr>
				<td class="text-center">{!! $no !!}</td>
				<td>{!! $list->sku !!}</td>
				<td>{!! $list->nama !!}</td>
				<td class="text-center">
				 	<span class='label label-success'>
				 		{!! $list->stok_barang !!}		
				 	</span>
				 </td>
				<td class="text-center">{!! $list->fk__mst_cabang !!}</td>
				<td class="text-center">
					-
				</td>
			</tr>
			<?php $no++; ?>
		@endforeach
	</tbody>
</table>

{!! $detail_produk->appends(Request::all())->render(); !!}