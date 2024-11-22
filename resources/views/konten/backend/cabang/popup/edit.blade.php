<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
<h1>
	<i class='fa fa-plus-square'></i> Edit Cabang
</h1>
<hr>

<div class="row">
	<div class="col-md-12" id="pesan"></div>
	<div class="col-md-6">
	
		<div class="form-group">
			<label for="nama">Nama Cabang :</label>
			<input type="text" id="nama" class="form-control" placeholder="nama cabang..." value="{{ $cabang->nama }}">
		</div>	

		<div class="form-group">
			<label for="kode_cabang">Kode Cabang :</label>
			<i class='fa fa-question-circle' data-toggle='tooltip' title='3 atau 4 huruf kapital'></i>
			<input type="text" id="kode_cabang" class="form-control" placeholder="kode cabang..." value="{{ $cabang->kode_cabang }}">
		</div>	

		<div class="form-group">
			<label for="no_tlp">Nomor Telepon Kantor Cabang :</label>
			<input type="text" id="no_tlp" class="form-control" placeholder="nomor telepon..." value="{{ $cabang->no_tlp }}">
		</div>

		<div class="form-group">
			<label for="alamat">Alamat Kantor Cabang :</label>
			<input type="text" id="alamat" class="form-control" placeholder="alamat..." value="{{ $cabang->alamat }}">
		</div>

	</div>
	<div class="col-md-6">
		<label for="keterangan">Keterangan :</label>
		<i class='fa fa-question-circle' data-toggle='tooltip' title='keterangan tambahan mengenai cabang (boleh dikosongkan)'></i>
		<textarea id="keterangan" class="form-control" style="height:120px;">{{ $cabang->keterangan }}</textarea>
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
	id 			: {!! $cabang->id !!},
	nama 		: $('#nama').val(),
	kode_cabang : $('#kode_cabang').val(),
	no_tlp 		: $('#no_tlp').val(),
	alamat 		: $('#alamat').val(),
	keterangan 	: $('#keterangan').val(),
 	_token 		: '{!! csrf_token() !!}'
}

$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_cabang.update") }}',
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


