 

<script type="text/javascript">
$('#mst_produk_id').select2();
$('#mst_cabang_id').select2();





$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');


form_data ={
	nama 				: $('#nama').val(),
	barcode 			: $('#barcode').val(),
	mst_produk_id 		: $('#mst_produk_id').val(),
	harga_beli 			: $('#harga_beli').val(),
	harga_jual 			: $('#harga_jual').val(),
	harga_reseller 		: $('#harga_reseller').val(),
	mst_cabang_id 		: $('#mst_cabang_id').val(),
	stok_barang 		: $('#stok_barang').val(),
 	_token 				: '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_detail_produk.store") }}',
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
			 //window.location.reload();
			 swal({
			 	title : 'success',
			 	text : 'data telah ditambahkan',
			 	type : 'success'
			 }, function(){
			 	window.location.href = '{!! route("backend_detail_produk.index") !!}';
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


