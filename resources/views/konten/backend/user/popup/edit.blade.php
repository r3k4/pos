<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<h3>
	<i class='fa fa-pencil-square'></i> Edit User
</h3>
<hr>

<div class="row">
	<div class="col-md-12" id="pesan"></div>
	<div class="col-md-6">
			
		<div class="form-group">
			<label for="nama">Nama :</label>
			<input type="text" id="nama" name="nama" class="form-control" placeholder="nama pengguna..." value="{{ $user->nama }}">
		</div>	


		<div class="form-group">
			<label for="email">Email :</label>
			<input type="text" id="email" name="email" class="form-control" placeholder="email pengguna..." value="{{ $user->email }}">
		</div>	
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="ref_user_level_id">Level :</label>
			<select id="ref_user_level_id" name="ref_user_level_id" class="form-control">
				@foreach($level as $key => $value)
					<option value="{{ $key }}" {{ $user->ref_user_level_id == $key ? 'selected' : '' }}>{{ $value }}</option>
				@endforeach
			</select>
		</div>	


		<div class="form-group">
			<label for="mst_cabang_id">Cabang :</label>
			<i class='fa fa-question-circle' data-toggle='tooltip' title='untuk level administrator tidak perlu memilih cabang'></i>
			<select id="mst_cabang_id" name="mst_cabang_id" class="form-control">
				@foreach($cabang as $key => $value)
					<option value="{{ $key }}" {{ $user->mst_cabang_id == $key ? 'selected' : '' }}>{{ $value }}</option>
				@endforeach
			</select>
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
		nama 				: $('#nama').val(),
		email 				: $('#email').val(),
		ref_user_level_id 	: $('#ref_user_level_id').val(),
		mst_cabang_id 		: $('#mst_cabang_id').val(),
		_token 				: '{{ csrf_token() }}'
	}
	$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_user.update", $user->id) }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
			$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
			datajson = JSON.parse(xhr.responseText);
			$.each(datajson, function(index, value) {
				$('#pesan').append(index + ": " + value + "<br>")
			});
		},
		success:function(ok){
			swal({
				title : 'success',
				text : 'data telah tersimpan!',
				type : 'success'
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
