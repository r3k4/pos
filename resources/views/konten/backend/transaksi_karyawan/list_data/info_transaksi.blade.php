<span style='font-size:10px;'>
	<i class='fa fa-calendar'></i>
	@if($list->created_at->diffInDays() < 7)
		<span data-toggle='tooltip' title="{!! fungsi()->date_to_tgl(date('Y-m-d', strtotime($list->created_at))) !!}">
			{!! $list->created_at->diffForHumans() !!}
		</span>
	@else		
		{!! fungsi()->date_to_tgl(date('Y-m-d', strtotime($list->created_at))) !!}
	@endif
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