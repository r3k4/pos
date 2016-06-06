<h3>
	Filter Export Data
</h3>
<hr>

<div class="row">
	<div class="col-md-12">


	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('mst_cabang_id', 'Cabang : ') !!}
				{!! Form::select('mst_cabang_id', $cabang, '', ['id' => 'mst_cabang_id', 'class' => 'form-control']) !!}
			</div>			
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::label('thn', 'Tahun : ') !!}
				{{ Form::selectYear('thn', 2015, date('Y'),  date('Y'), ['class' => 'form-control', 'id' => 'thn', 'style' => 'width:100px']) }}
			</div>			
		</div>
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::label('bln', 'Bulan : ') !!}
				{{ Form::selectMonth('bln', date('m'),  ['class' => 'form-control', 'id' => 'bln', 'style' => 'width:100px']) }} 
			</div>		
		</div>
	</div>





		<div class="form-group">
			<button id='do_export' class='btn btn-info'>
				<i class='fa fa-file-excel-o'></i> Export
			</button>
		</div>


 


	</div>
</div>


<script type="text/javascript">
	$('#do_export').click(function(){
		mst_cabang_id = $.trim($('#mst_cabang_id').val());
		thn = $('#thn').val();
		bln = $('#bln').val();

		if(mst_cabang_id == '' || thn == '' || bln == ''){
			return false;
		}
		url = '{!! route("backend_transaksi_karyawan.do_export") !!}?mst_cabang_id='
			+mst_cabang_id
			+'&&thn='+thn
			+'&&bln='+bln;
		window.open(url, '__blank');

	});
</script>