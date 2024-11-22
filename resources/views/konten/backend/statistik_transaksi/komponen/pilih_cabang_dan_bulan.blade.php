<style type="text/css">
	.tabel_filter td{
		padding-right: 1em;
	}
</style>

<?php 
if(Request::has('mst_cabang_id')){
	$value_cabang = Request::get('mst_cabang_id');
}else{
	$value_cabang = '';
}

if(Request::has('bln')){
	$value_bln = Request::get('bln');
}else{
	$value_bln = date('m');
}

if(Request::has('thn')){
	$value_thn = Request::get('thn');
}else{
	$value_thn = date('Y');
}
?>

<table class="tabel_filter pull-right">
	<tr>
		<td>
			<select id="mst_cabang_id" name="mst_cabang_id" class="form-control">
				@foreach($cabang as $id => $name)
					<option value="{{ $id }}" {{ $id == $value_cabang ? 'selected' : '' }}>{{ $name }}</option>
				@endforeach
			</select>
		</td>
		<td>
			<select id="bln" name="bln" class="form-control" style="width:100px">
				@for($i = 1; $i <= 12; $i++)
					<option value="{{ $i }}" {{ $i == $value_bln ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
				@endfor
			</select>
		</td>
		<td>
			<select id="thn" name="thn" class="form-control" style="width:100px">
				@for($i = 2015; $i <= date('Y'); $i++)
					<option value="{{ $i }}" {{ $i == $value_thn ? 'selected' : '' }}>{{ $i }}</option>
				@endfor
			</select>
		</td>
		<td>
			<button class="btn btn-info" id="do_filter">
				<i class='fa fa-random'></i>
			</button>
		</td>
	</tr>
</table>

<script type="text/javascript">
$('#do_filter').click(function(){
	mst_cabang_id = $.trim($('#mst_cabang_id').val());
	bln = $.trim($('#bln').val());
	thn = $.trim($('#thn').val());

	if(mst_cabang_id == '' || bln == '' || thn == ''){
		return false;
	}
	$('#loading_filter').fadeIn();

	window.location.href = '{!! route("backend_statistik_transaksi.index") !!}/?mst_cabang_id='
		+mst_cabang_id+'&&bln='+bln+'&&thn='+thn;
});
</script>