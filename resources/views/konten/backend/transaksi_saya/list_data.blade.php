<table class="table table-bordered table-hover">
	<thead>
		<tr style="font-size:20px;" class="alert-info">
			<th width="50px" class="text-center">No.</th>
			<th>No Transaksi</th>
			<th width="100px" class="text-center">Item(s)</th>
			<th width="150px" class="text-center">Total Harga</th>
			<th width="90px" class="text-center">
				Action
			</th>
		</tr>
	</thead>
	<tbody>
		@php($no=$transaksi->firstItem())
		@foreach($transaksi as $list)
		<tr>
			<td class="text-center">{!! $no++ !!}</td>
			<td>
				{!! $list->no_transaksi !!}
				<hr style="margin:2px;">
				<span style='font-size:10px;'>
				{!! fungsi()->date_to_tgl(date('Y-m-d', strtotime($list->created_at))) !!}
				 - {!! date('H:i', strtotime($list->created_at)) !!} WIB					
				</span>

			</td>
			<td class="text-center">
				<span style='font-size:17px;' class='label label-success'>
					{!! count($list->mst_penjualan) !!}
				</span>
			</td>
			<td class="text-center">{!! fungsi()->rupiah($list->subtotal_pembayaran) !!}</td>

 
			<td class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{!! $transaksi->render() !!}