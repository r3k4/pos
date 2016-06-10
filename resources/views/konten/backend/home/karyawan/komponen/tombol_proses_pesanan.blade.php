<button style="margin-left: 1em;" id="proses_pesanan" class="btn btn-success pull-right">
	 Proses Pesanan <i class="fa fa-arrow-right"></i>
</button>

<script type="text/javascript">
		$('#proses_pesanan').click(function(){
			swal({   
				title: "Are you sure?",   
				type: "warning",   
				showCancelButton: true,   
				showLoaderOnConfirm : true,
				confirmButtonColor: "#55DDBA",   
				closeOnConfirm: false }, function(){   


				bayar = $.trim($('#bayar').val());
				var bayar = $('#bayar').unmask();
				var diskon = $('#diskon').unmask();
				if(bayar == ''){
					swal.showInputError("nominal pembayaran tdk boleh kosong!");	
					return false;
				}

				harus_dibayar = {!! Cart::total() !!};
				harus_dibayar_format_price =  "{!! fungsi()->rupiah(Cart::total()) !!}";


				if(bayar < harus_dibayar && diskon == 0){
					swal.showInputError("proses gagal! total harga : "+harus_dibayar_format_price );
					return false;
				}

				kembalian = parseInt(bayar) - parseInt(harus_dibayar);


		
				$('#pesan').removeClass('alert alert-danger animated shake').html('');

			form_data ={
				kembalian : kembalian,
				bayar : bayar,
				diskon : diskon,
				mst_cabang_id : {!! Auth::user()->mst_cabang_id !!},
			 	_token : '{!! csrf_token() !!}'
			}
		$('#proses_pesanan').attr('disabled', 'disabled');
			$.ajax({
				url : '{{ route("backend_home.insert_penjualan") }}',
				data : form_data,
				type : 'post',
				error:function(xhr, status, error){
					$('#proses_pesanan').removeAttr('disabled');
				 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
			        datajson = JSON.parse(xhr.responseText);
			        $.each(datajson, function( index, value ) {
			       		$('#pesan').append(index + ": " + value+"<br>")
			          });
				},
				success:function(ok){
					//swal('data telah diproses');
					 $('#list_pembelian').load('{!! route("backend_home.show_list_pembelian") !!}');
					 
					 
					 $('#myModal').removeData('bs.modal').modal({backdrop: 'static', keyboard: true});
					 
					 // tutup window sweet alert
					 swal.close();	
					 $('.modal-body').load('{!! route("backend_home.show_single_transaksi", null) !!}/'+ok);

 


				}
			});

			});
		
		});
	

</script>