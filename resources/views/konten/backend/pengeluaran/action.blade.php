@can('updatePengeluaran', $list)
	@include($base_view.'action.edit')
@else 
	<i class='fa fa-pencil-square text-danger'></i>
@endif
||
@include($base_view.'action.show')
||
@can('destroyPengeluaran', $list)
	@include($base_view.'action.delete')
@else 
	<i class='fa fa-times text-danger'></i>
@endif