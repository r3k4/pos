<table class="table">
	<thead>
		<tr style="font-size:20px;" class="alert-info">
			<th class="text-center" width="50px">No.</th>
			<th>Nama Cabang</th>
			<th width="150px" class="text-center">Kode Cabang</th>
			<th width="120px" class="text-center">No Tlp</th>
			<th width="120px" class="text-center">Karyawan</th>
			<th class="text-center" width="100px">
				Action
			</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $cabang->firstItem(); ?>
	@foreach($cabang as $list)
		<tr style="font-size:15px;">
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td class="text-center">{!! $list->kode_cabang !!}</td>
			<td class="text-center">{!! $list->no_tlp !!}</td>
			<td class="text-center">
				<span class='label label-success'>
					{!! count($list->mst_user) !!}
				</span> 
			</td>
			<td class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
		@php($no++)
	@endforeach

	</tbody>
</table>

{!! $cabang->render() !!}