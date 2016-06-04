

<script type="text/javascript">
$('#kode_barang').keypress(function(e) {
    if(e.which == 13) {

		$('#pesan').removeClass('alert alert-danger animated shake').html('');
		form_data ={
			kode_barang : $('#kode_barang').val(),
		 	_token : '{!! csrf_token() !!}'
		}
		$('#simpan').attr('disabled', 'disabled');
			$.ajax({
				url : '{{ route("backend_home.check_produk_transaksi") }}',
				data : form_data,
				type : 'post',
				error:function(xhr, status, error){
					$('#myModal').modal('show');
					$('.modal-body').html('<div id="pesan"></div>');
					$('#simpan').removeAttr('disabled');
				 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
			        datajson = JSON.parse(xhr.responseText);
			        $.each(datajson, function( index, value ) {
			       		$('#pesan').append(index + ": " + value+"<br>")
			          });
				},
				success:function(ok){
					result = Object.keys(ok).length;
					if(result > 0){

						if(ok.stok_barang == 0){
							swal('error', 'stok barang sudah habis', 'error');
						}else{
							// stok barang masih ada

							// start ajax
							$.ajax({
								url : '{!! route("backend_home.add_to_cart") !!}',
								data : {id : ok.id, nama : ok.nama, jml : 1, harga : ok.harga_jual, _token : '{!! csrf_token() !!}' },
								type : 'post',
								error:function(xhr, status, error){
									$('#myModal').modal('show');
									$('.modal-body').html('<div id="pesan"></div>');
									$('#simpan').removeAttr('disabled');
								 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
							        datajson = JSON.parse(xhr.responseText);
							        $.each(datajson, function( index, value ) {
							       		$('#pesan').append(index + ": " + value+"<br>")
							          });
								},
								success : function(hasil_pembelian){
									 $('#list_pembelian').html(hasil_pembelian);
									 $('#kode_barang').val('').focus();										
								}
							});
							// end of ajax request
							
						}						
					}
				}
			});
      

    } //end if
});


$('#simpan').click(function(){

})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>


