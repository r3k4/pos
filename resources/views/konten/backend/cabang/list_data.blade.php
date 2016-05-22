<table class="table">
	<thead>
		<tr>
			<th class="text-center" width="50px">No.</th>
			<th>Nama Cabang</th>
			<th width="150px" class="text-center">Kode Cabang</th>
			<th width="120px" class="text-center">No Tlp</th>
			<th class="text-center" width="100px">
				Action
			</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $cabang->firstItem(); ?>
	@foreach($cabang as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td class="text-center">{!! $list->kode_cabang !!}</td>
			<td class="text-center">{!! $list->no_tlp !!}</td>
			<td class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
	@endforeach

	</tbody>
</table>

{!! $cabang->render() !!}