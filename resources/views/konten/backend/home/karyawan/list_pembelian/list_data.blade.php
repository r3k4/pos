<table class="table table-bordered table-hover">
	<thead>
		<tr class="alert-info">
			<th class="text-center" width="50px">No.</th>
			<th>SKU</th>
			<th>Nama</th>
			<th>Jml</th>
			<th>harga</th>
			<th>subtotal</th>
			<th width="80px">Action</th>
		</tr>
	</thead>
	<tbody>
	@php($no=1)
	@foreach(Cart::content() as $list)
		<tr>
			<td class="text-center">{!! $no++ !!}</td>
			<td>{!! $list->options->sku !!}</td>
			<td>{!! $list->name !!}</td>
			<td>{!! $list->qty !!}</td>
			<td>
				{!! fungsi()->rupiah($list->price) !!}
			</td>
			<td>
				{!! fungsi()->rupiah($list->subtotal) !!}				
			</td>
			<td class="text-center">
				@include($base_view.'karyawan.action')
			</td>
		</tr> 
	@endforeach
	</tbody>
</table>