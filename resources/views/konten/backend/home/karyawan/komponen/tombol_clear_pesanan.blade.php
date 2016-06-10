<button id="kosongkan_cart" class="btn btn-primary pull-right">
	<i class="fa fa-refresh"></i> Kosongkan
</button>

<script type="text/javascript">
$('#kosongkan_cart').click(function(){
	swal({   
		title: "Are you sure?",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		closeOnConfirm: false }, function(){   

		$('#pesan').removeClass('alert alert-danger animated shake').html('');

	form_data ={
		kosongkan : 1,
	 	_token : '{!! csrf_token() !!}'
	}
$('#kosongkan_cart').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_home.kosongkan_cart") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#kosongkan_cart').removeAttr('disabled');
		 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	        datajson = JSON.parse(xhr.responseText);
	        $.each(datajson, function( index, value ) {
	       		$('#pesan').append(index + ": " + value+"<br>")
	          });
		},
		success:function(ok){
			swal('data telah dikosongkan');
			 $('#list_pembelian').html(ok);
			 //window.location.reload();
		}
	});

	});

});	
</script>