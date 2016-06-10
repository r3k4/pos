<table class="table">
	<thead>
		<tr style="font-size:20px;" class="alert-info">
			<th class="text-center" width="50px">No.</th>
			<th>
				  Nama Produk
			</th>
			<th width="180px">Jenis Produk</th>

			@if(\Auth::user()->ref_user_level_id == 1)
				<th width="150px">Cabang</th>
			@endif

			<th width="90px">Stok</th>
			<th width="180px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $produk->firstItem(); ?>
	@foreach($produk as $list)
		<tr style="font-size:15px;">
			<td class="text-center">{!! $no !!}</td>
			<td>
				<a href="{!! route('backend.stok_produk.index', $list->id) !!}">
					{!! '['.$list->sku.'] '.$list->nama !!}
				</a>
			</td>
			<td>
				<span style='border-bottom: 3px solid {!! $list->fk__ref_produk_warna !!}'>
					{!! $list->fk__ref_produk !!}					
				</span>
			</td>

			@if(\Auth::user()->ref_user_level_id == 1)
				<td>{!! $list->fk__mst_cabang !!}</td>
			@endif

			<td>
				@if($list->stok_barang == 0)
					<span class='label label-danger'>
						-kosong-
					</span>
				@else
					<span class='label label-success'>
						{!! $list->stok_barang.' '.$list->fk__ref_satuan_produk !!}						
					</span>
				@endif				
			</td>
			<td class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
		<?php $no++; ?>
	@endforeach

	</tbody>
</table>


{!! $produk->appends(Request::all())->render() !!}