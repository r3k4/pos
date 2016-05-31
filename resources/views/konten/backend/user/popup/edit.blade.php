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
			{!! Form::label('nama', 'Nama : ') !!}
			{!! Form::text('nama', $user->nama, ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'nama pengguna...']) !!}
		</div>	


		<div class="form-group">
			{!! Form::label('email', 'Email : ') !!}
			{!! Form::text('email', $user->email, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'email pengguna...']) !!}
		</div>	
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('ref_user_level_id', 'Level : ') !!}
			{!! Form::select('ref_user_level_id', $level, $user->ref_user_level_id, ['id' => 'ref_user_level_id', 'class' => 'form-control']) !!}
		</div>	


		<div class="form-group">
			{!! Form::label('mst_cabang_id', 'Cabang : ') !!}
			<i class='fa fa-question-circle' data-toggle='tooltip' title='untuk level administrator tidak perlu memilih cabang'></i>
			{!! Form::select('mst_cabang_id', $cabang, $user->mst_cabang_id, ['id' => 'mst_cabang_id', 'class' => 'form-control']) !!}
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

form_data ={
	nama 				: $('#nama').val(),
	email 				: $('#email').val(),
	ref_user_level_id 	: $('#ref_user_level_id').val(),
	mst_cabang_id 		: $('#mst_cabang_id').val(),
 	_token 				: '{!! csrf_token() !!}'
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
        $.each(datajson, function( index, value ) {
       		$('#pesan').append(index + ": " + value+"<br>")
          });

		      //    alert('error! terjadi kesalahan pada sisi server!')
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



