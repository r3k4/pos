<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

@if(count($produk)>0)

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th width="50px">No.</th>
				<th>SKU</th>
				<th>Nama Produk</th>
				<th class="text-center">Stok</th>
				<th>Harga</th>
				<th width="80px" class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			@php($no=1)
			@foreach($produk as $list)
			<tr>
				<td class="text-center">{!! $no++ !!}</td>
				<td>{!! $list->sku !!}</td>
				<td>{!! $list->nama !!}</td>
				<td class="text-center">{!! $list->stok_barang !!}</td>
				<td>{!! fungsi()->rupiah($list->harga_jual) !!}</td>
				<td class="text-center">
					@include($base_view.'karyawan.popup.action')
				</td>
			</tr>

			@endforeach
		</tbody>
	</table>
@else 
	<div class="col-md-12 alert alert-warning">
		<h1>
			Data tidak ditemukan
		</h1>
	</div>
@endif