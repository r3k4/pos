<div class="row"  >


<div class="col-md-2">
	{!! Form::select('filter_by', ['' => '-filter by-', 'bln' => 'bulan', 'tgl' => 'tanggal'], '', [ 'class' => 'form-control', 'id' => 'filter_by']) !!}
</div>


	@include($base_view.'komponen.filter_by_bln')
	@include($base_view.'komponen.filter_by_tgl')

</div>



<script type="text/javascript">
	$('#filter_by').change(function(){
		pilih = $('#filter_by').val();
		if(pilih == 'bln'){
			$('#filter_bulan').fadeIn();
			$('#filter_tgl').hide();
		}else if(pilih == 'tgl'){
			$('#filter_bulan').hide();
			$('#filter_tgl').fadeIn();			
		}
	});


@if(Request::get('getByBln'))
	$('#filter_bulan').fadeIn();
	$('#filter_by').val('bln');
@endif

@if(Request::get('getByTgl'))
	$('#filter_tgl').fadeIn();
	$('#filter_by').val('tgl');
@endif


</script>