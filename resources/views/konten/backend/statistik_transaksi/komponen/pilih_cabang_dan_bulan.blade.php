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
 			{!! Form::select('mst_cabang_id', $cabang, $value_cabang, ['id' => 'mst_cabang_id', 'class' => 'form-control']) !!}
 		</td>
 		<td>
 			{{ Form::selectMonth('bln', $value_bln,  ['class' => 'form-control', 'id' => 'bln', 'style' => 'width:100px']) }} 
 		</td>
 		<td>
 			{{ Form::selectYear('thn', 2015, date('Y'),  $value_thn, ['class' => 'form-control', 'id' => 'thn', 'style' => 'width:100px']) }}
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