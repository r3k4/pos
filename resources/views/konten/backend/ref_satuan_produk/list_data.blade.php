<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="50px">No.</th>
			<th>Jenis Produk</th>
			<th class="text-center" width="120px">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $ref_satuan_produk->firstItem(); ?>
		@foreach($ref_satuan_produk as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
		<?php $no++; ?>
		@endforeach
	</tbody>
</table>

{!! $ref_satuan_produk->appends(Request::all())->render() !!}