<span style='font-size:10px;'>
	<i class='fa fa-calendar'></i>
	{!! fungsi()->date_to_tgl(date('Y-m-d', strtotime($list->created_at))) !!}
		||
	 <i class='fa fa-clock-o'></i> {!! date('H:i', strtotime($list->created_at)) !!} WIB	
	 	||
	 <i class='fa fa-sitemap'></i> 
	 	<a href="{!! route('backend_transaksi_karyawan.index') !!}?cabangId={!! $list->mst_cabang_id !!}">
	 		{!! $list->fk__mst_cabang !!}
	 	</a>
	 	|| 
	 <i class='fa fa-user'></i> {!! $list->fk__mst_user !!}
</span>