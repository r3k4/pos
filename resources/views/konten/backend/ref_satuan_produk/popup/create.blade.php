<h3>
	<i class='fa fa-plus-square'></i> Menambahkan Jenis Produk
</h3>
<hr>

<div class="row">
	<div class="col-md-12">

		<div id="pesan"></div>

		<div class="form-group">
			{!! Form::label('nama', 'Jenis Produk : ') !!}
			{!! Form::text('nama', '', ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'jenis produk...']) !!}
		</div>
		<hr>
		<div class="form-group">
			<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> SIMPAN</button>
		</div>

		
	</div>	
</div>





<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
nama = $('#nama').val();

form_data ={
	nama : nama,
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_ref_satuan_produk.store") }}',
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
			 //window.location.reload();
			 swal({
			 	title : 'success', 
			 	text : 'data telah ditambahkan', 
			 	type : 'success'
			 }, function(){
			 	window.location.reload();
			 });
		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>


