<table class="table">
	<thead>
		<tr style="font-size:20px;">
			<th class="text-center" width="50px">No.</th>
			<th>Nama Pengeluaran</th>
			<th class="text-center" width="150px">Harga/Biaya</th>
			<th width="90px" class="text-center">Jumlah</th>
			<th class="text-center" width="150px">Subtotal</th>
			<th class="text-center" width="120px">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $pengeluaran->firstItem(); ?>
	@foreach($pengeluaran as $list)
		<tr style="font-size:15px;">
			<td class="text-center">{!! $no !!}</td>
			<td>
				{!! $list->nama !!}
				<hr style="margin:3px;">
				<span class='label label-success' style='font-size:10px;'>
					<i class='fa fa-user'></i> {!! $list->fk__mst_user !!}		
					|| 
					<i class='fa fa-calendar'></i> {!! fungsi()->date_to_tgl($list->tgl_pengeluaran) !!}
				</span>
			</td>
			<td class="text-center">{!! '@ '.fungsi()->rupiah($list->biaya) !!}</td>
			<td class="text-center">{!! $list->jumlah !!}</td>
			<td class="text-center">{!! fungsi()->rupiah($list->subtotal_biaya) !!}</td>
			<td class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
		<?php $no++; ?>
	@endforeach
	</tbody>
</table>


{!! $pengeluaran->render() !!}