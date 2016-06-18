@include($base_view.'action.reset_password')
||
@include($base_view.'action.edit')

@if(\Auth::user()->id != $list->id)
	||
	@include($base_view.'action.delete')
@else 
	<i class='fa fa-times text-danger'></i>
@endif