@include($base_view.'action.cetak_barcode')
||
@include($base_view.'action.kelola_stok')
||
@can('updateProduk', $list)
	@include($base_view.'action.edit')
@else
	<i class='fa fa-pencil-square text-danger'></i>
@endcan
||
@include($base_view.'action.show')
||
@can('destroyProduk', $list)
	@include($base_view.'action.delete')
@else
	<i class='fa fa-times text-danger'></i>
@endcan



