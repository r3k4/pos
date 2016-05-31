<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="50px">No.</th>
			<th>Nama</th>
			<th width="150px" class="text-center">Email</th>
			<th width="100px" class="text-center">Level</th>
			<th width="100px" class="text-center">Cabang</th>
			<th width="100px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $user->firstItem(); ?>
	@foreach($user as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td>
				{!! $list->email !!}
			</td>
			<td class="text-center">
				{!! $list->fk__ref_user_level !!}
			</td>
			<td class="text-center">
				@if($list->ref_user_level_id == 1)
					-
				@else
					@if($list->fk__mst_cabang == '')
						<span class='label label-danger'>kosong</span>
					@else
						<span class='label label-success'>
							{!! $list->fk__mst_cabang !!}
						</span> 
					@endif
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

{!! $user->render() !!}

