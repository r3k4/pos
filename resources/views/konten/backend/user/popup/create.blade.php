<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<h3>
	<i class='fa fa-plus-square'></i> Tambah Pengguna
</h3>
<hr>

<div class="row">
	<div class="col-md-12" id="pesan"></div>
	<div class="col-md-6">
			
		<div class="form-group">
			<label for="nama">Nama :</label>
			<input type="text" id="nama" class="form-control" placeholder="nama pengguna...">
		</div>	


		<div class="form-group">
			<label for="email">Email :</label>
			<input type="text" id="email" class="form-control" placeholder="email pengguna...">
		</div>	

		<div class="form-group">
			<label for="mst_cabang_id">Cabang :</label>
			<i class='fa fa-question-circle' data-toggle='tooltip' title='untuk level administrator tidak perlu memilih cabang'></i>
			<select id="mst_cabang_id" class="form-control">
				@foreach($cabang as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select>
		</div>	


	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="ref_user_level_id">Level :</label>
			<select id="ref_user_level_id" class="form-control">
				@foreach($level as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="password">Password :</label>
			<input type="password" id="password" class="form-control" placeholder="password...">
		</div>	

		<div class="form-group">
			<label for="password_confirmation">re-enter Password :</label>
			<input type="password" id="password_confirmation" class="form-control" placeholder="re-enter Password...">
		</div>	

	</div>

	<div class="col-md-12">
		<hr>
		<div class="form-group">
			<button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>
		</div>		
	</div>
</div>

<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

	if($('#ref_user_level_id').val() == 1 ){
		$('#mst_cabang_id').val('');
	}

	form_data = {
		nama: $('#nama').val(),
		password: $('#password').val(),
		password_confirmation: $('#password_confirmation').val(),
		email: $('#email').val(),
		ref_user_level_id: $('#ref_user_level_id').val(),
		mst_cabang_id: $('#mst_cabang_id').val(),
		_token: '{!! csrf_token() !!}'
	}
	$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url: '{{ route("backend_user.store") }}',
		data: form_data,
		type: 'post',
		error: function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
			$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
			datajson = JSON.parse(xhr.responseText);
			$.each(datajson, function(index, value) {
				$('#pesan').append(index + ": " + value + "<br>")
			});
		},
		success: function(ok){
			swal({
				title: 'success',
				text: 'data telah tersimpan!',
				type: 'success'
			}, function(){
				window.location.reload();
			})
		}
	})
})

$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})
</script>
