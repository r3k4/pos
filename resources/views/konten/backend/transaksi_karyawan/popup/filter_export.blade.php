<h3>
	Filter Export Data
</h3>
<hr>

<div class="row">
	<div class="col-md-12">
		<form id="exportForm">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="mst_cabang_id">Cabang :</label>
						<select id="mst_cabang_id" name="mst_cabang_id" class="form-control">
							@foreach($cabang as $id => $name)
								<option value="{{ $id }}">{{ $name }}</option>
							@endforeach
						</select>
					</div>			
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="thn">Tahun :</label>
						<select id="thn" name="thn" class="form-control" style="width:100px">
							@for($year = 2015; $year <= date('Y'); $year++)
								<option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
							@endfor
						</select>
					</div>			
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="bln">Bulan :</label>
						<select id="bln" name="bln" class="form-control" style="width:100px">
							@for($month = 1; $month <= 12; $month++)
								<option value="{{ $month }}" {{ $month == date('m') ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
							@endfor
						</select>
					</div>		
				</div>
			</div>

			<div class="form-group">
				<button type="button" id="do_export" class="btn btn-info">
					<i class="fa fa-file-excel-o"></i> Export
				</button>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	document.getElementById('do_export').addEventListener('click', function() {
		var mst_cabang_id = document.getElementById('mst_cabang_id').value.trim();
		var thn = document.getElementById('thn').value;
		var bln = document.getElementById('bln').value;

		if (mst_cabang_id === '' || thn === '' || bln === '') {
			return false;
		}

		var url = '{!! route("backend_transaksi_karyawan.do_export") !!}?mst_cabang_id='
			+ mst_cabang_id
			+ '&&thn=' + thn
			+ '&&bln=' + bln;
		window.open(url, '__blank');
	});
</script>