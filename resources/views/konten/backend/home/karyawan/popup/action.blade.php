<i data-toggle='tooltip' title='tambahkan ke pesanan' class='fa fa-share' style='cursor:pointer;' id='tambah_cart{{ $list->id }}'></i>

<script type="text/javascript">
$('#tambah_cart{{ $list->id }}').click(function(){

 			form_data_add_cart = {
				id : {!! $list->id !!}, 
				nama : '{!! $list->nama !!}', 
				jml : 1, 
				harga : {!! $list->harga_jual !!}, 
				sku : '{!! $list->sku !!}',
				_token : '{!! csrf_token() !!}' 
			}
 
			$.ajax({
				url : '{!! route("backend_home.add_to_cart") !!}',
				data : form_data_add_cart,
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
				success : function(hasil_pembelian_cart){
					 $('#list_pembelian').html(hasil_pembelian_cart);
					 $('#kode_barang').val('').focus();		
					 // swal('data telah ditambahkan');								
				}
			});
			// end of ajax request




});
</script>


