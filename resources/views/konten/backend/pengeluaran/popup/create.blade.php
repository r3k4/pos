<h3>
	<i class="fa fa-plus-square"></i> Tambah pengeluaran
</h3>

<hr>

<div class="row">
	<div class="col-md-12">
	<div id="pesan"></div>
		<div class="form-group">
			<label for="nama">Nama Pengeluaran :</label>
			<input type="text" id="nama" class="form-control" placeholder="nama pengeluaran...">
		</div>		
	</div>

	<div class="row">
		<div class="col-md-12">		 
			<div class="col-md-6">
				<div class="form-group">
					<label for="biaya">Harga/Biaya :</label>
					<input type="text" id="biaya" class="form-control" placeholder="biaya...">
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label for="jumlah">Jumlah :</label>
					<input type="text" id="jumlah" class="form-control" placeholder="jumlah..." value="1">
				</div>		
			</div>	
			<div class="col-md-4">
				<div class="form-group">
					<label for="subtotal_biaya">Subtotal :</label>
					<input type="text" id="subtotal_biaya" class="form-control" readonly>
				</div>		
			</div>
			@if(\Auth::user()->ref_user_level_id == 1)
				<div class="col-md-4">
					<div class="form-group">
						<label for="mst_cabang_id">Cabang :</label>
						<select id="mst_cabang_id" class="form-control">
							@foreach($cabang as $id => $name)
								<option value="{{ $id }}">{{ $name }}</option>
							@endforeach
						</select>
					</div>		
				</div>
			@else
				<input type="hidden" id="mst_cabang_id" value="{{ \Auth::user()->mst_cabang_id }}">
			@endif
		</div>
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="form-group">
					<label for="tgl_pengeluaran">Tanggal pengeluaran:</label>
					<div class='input-group date' id='datetimepicker2'>
						<input id="tgl_pengeluaran" value="{{ date('Y-m-d') }}" type='text' class="form-control" readonly>
						<span class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</span>
					</div>
				</div>				
			</div>			
		</div>
	</div>

	<div class="col-md-12">
		<label for="keterangan">Note :</label>
		<textarea id="keterangan" class="form-control" placeholder="keterangan..." style="height:100px;"></textarea>
	<hr>
	
	<div class="form-group">
		<button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>	
	</div>
	</div>
</div>

<script type="text/javascript">
	$(function () {
		$('#datetimepicker2').datetimepicker({
			locale: 'id',
			ignoreReadonly : true,
			format: 'YYYY-MM-DD',
			icons: {
				time: "fa fa-clock-o",
				next: "fa fa-arrow-right",
				previous: "fa fa-arrow-left",
				date: "fa fa-calendar",
				up: "fa fa-arrow-up",
				down: "fa fa-arrow-down"
			}		        	
		});
	});

	$('#jumlah, #biaya').keypress(function(e) {
		var a = [];
		var k = e.which;

		for (i = 48; i < 58; i++)
			a.push(i);
		a.push(8);
		if (!(a.indexOf(k) >= 0))
			e.preventDefault();
	});

	$('#biaya, #jumlah').keyup(function(){
		var jml = $('#jumlah').val();
		var biaya = $('#biaya').val();
		$('#subtotal_biaya').val(biaya * jml);
	});

	$('#simpan').click(function(){
		$('#pesan').removeClass('alert alert-danger animated shake').html('');

		var form_data = {
			mst_user_id : {!! Auth::user()->id !!},
			tgl_pengeluaran : $('#tgl_pengeluaran').val(),
			mst_cabang_id : $('#mst_cabang_id').val(),
			nama : $('#nama').val(),
			biaya : $('#biaya').val(),
			jumlah : $('#jumlah').val(),
			subtotal_biaya : $('#subtotal_biaya').val(),
			keterangan : $('#keterangan').val(),
			_token : '{!! csrf_token() !!}'
		};

		$('#simpan').attr('disabled', 'disabled');
		$.ajax({
			url : '{{ route("backend_pengeluaran.store") }}',
			data : form_data,
			type : 'post',
			error:function(xhr, status, error){
				$('#simpan').removeAttr('disabled');
				$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
				var datajson = JSON.parse(xhr.responseText);
				$.each(datajson, function(index, value) {
					$('#pesan').append(index + ": " + value + "<br>");
				});
			},
			success:function(ok){
				 swal({
					title : 'success',
					text : 'data telah ditambahkan',
					type : 'success'
				 }, function(){
					window.location.reload();
				 });
			}
		});
	});

	$('#pesan').click(function(){
		$('#pesan').fadeOut(function(){
			$('#pesan').html('').show().removeClass('alert alert-danger');
		});
	});
</script>
