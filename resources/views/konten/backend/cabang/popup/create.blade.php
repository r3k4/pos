<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
<h1>
	<i class='fa fa-plus-square'></i> Menambahkan Cabang Baru
</h1>
<hr>

<div class="row">
	<div class="col-md-12" id="pesan"></div>
	<div class="col-md-6">
	
		<div class="form-group">
			{!! Form::label('nama', 'Nama Cabang : ') !!}
			{!! Form::text('nama', '', ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'nama cabang...']) !!}
		</div>	

		<div class="form-group">
			{!! Form::label('kode_cabang', 'Kode Cabang : ') !!}
				<i class='fa fa-question-circle' data-toggle='tooltip' title='3 atau 4 huruf kapital'></i>
			{!! Form::text('kode_cabang', '', ['id' => 'kode_cabang', 'class' => 'form-control', 'placeholder' => 'kode cabang...']) !!}
		</div>	

		<div class="form-group">
			{!! Form::label('no_tlp', 'nomor telepon kantor cabang : ') !!}			
			{!! Form::text('no_tlp', '', ['id' => 'no_tlp', 'class' => 'form-control', 'placeholder' => 'nomor telepon...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('alamat', 'alamat kantor cabang : ') !!}			
			{!! Form::text('alamat', '', ['id' => 'alamat', 'class' => 'form-control', 'placeholder' => 'alamat...']) !!}
		</div>

	</div>
	<div class="col-md-6">
		{!! Form::label('keterangan', 'Keterangan :') !!}
		<i class='fa fa-question-circle' data-toggle='tooltip' title='keterangan tambahan mengenai cabang (boleh dikosongkan)'></i>
		{!! Form::textarea('keterangan', '', ['id' => 'keterangan', 'class' => 'form-control', 'style' => 'height:120px;']) !!}
	</div>
	<div class="col-md-12">
		<hr>

		<button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>
	</div>


</div>




<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');


form_data ={
	nama 		: $('#nama').val(),
	kode_cabang : $('#kode_cabang').val(),
	no_tlp 		: $('#no_tlp').val(),
	alamat 		: $('#alamat').val(),
	keterangan 	: $('#keterangan').val(),
 	_token 		: '{!! csrf_token() !!}'
}

$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_cabang.store") }}',
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
				text : 'data telah ditambahkan',
				type : 'success'
			},function(){
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


