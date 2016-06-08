<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

form_data ={
	nama_aplikasi : $('#nama_aplikasi').val(),
	backup_db : $('#backup_db').val(),
	jam_backup : $('#jam_backup').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_konfigurasi.update") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
			$('#myModal').modal('show');
			$('.modal-body').html('<div id="pesan"></div>');
		 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	        datajson = JSON.parse(xhr.responseText);
	        $.each(datajson, function( index, value ) {
	       		$('#pesan').append(index + ": " + value+"<br>")
	          });
		},
		success:function(ok){
			$('#simpan').removeAttr('disabled');
			 swal({
			 title : 'success',
			 text : 'konfigurasi telah tersimpan',
			 type : 'success'
			 }, function(){
			 //window.location.reload();
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


