<table class="table">
	<thead>
		<tr>
			<th class="text-center" width="50px">No.</th>
			<th>Nama Produk</th>
			<th width="200px">Jenis Produk</th>
			<th width="150px">Cabang</th>
			<th width="120px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $produk->firstItem(); ?>
	@foreach($produk as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td>{!! $list->fk__ref_produk !!}</td>
			<td>{!! $list->fk__mst_cabang !!}</td>
			<td class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
		<?php $no++; ?>
	@endforeach

	</tbody>
</table>


{!! $produk->render() !!}