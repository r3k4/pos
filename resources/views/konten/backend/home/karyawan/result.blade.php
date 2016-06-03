<hr>
<h4 style="font-weight:bold;">
	{!! $produk->nama !!}
</h4>
<table class="table" style="font-size:15px">
	<tr>
		<td width="170px">
			Harga
		</td>
		<td width="10px">:</td>
		<td>
			{!! fungsi()->rupiah($produk->harga_jual) !!}
		</td>
	</tr>

	<tr>
		<td>
			Stok Tersedia
		</td>
		<td width="10px">:</td>
		<td>
			@if($produk->stok_barang == 0) 
				<span class='label label-danger'>
					-kosong-
				</span>
			@else
				<span class='label label-success'>
					{!! $produk->stok_barang.' '.$produk->fk__ref_satuan_produk !!}					
				</span>
			@endif
		</td>
	</tr>

	<tr>
		<td>
			Jumlah
		</td>
		<td width="10px">:</td>
		<td>
			{!! Form::text('jml', '1', ['id' =>'jml']) !!}
		</td>
	</tr>	

</table>
<hr>
<div class="form-group">
	<button id='simpan' class='btn btn-primary'><i class='fa fa-share'></i> Tambahkan</button>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#simpan').focus();
	});

$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

form_data ={
	id : '{!! $produk->id !!}',
	jml : $('#jml').val(),
	nama : '{!! $produk->nama !!}',
	harga_jual : '{!! $produk->harga_jual !!}',
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_home.add_to_cart") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
		 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	        datajson = JSON.parse(xhr.responseText);
	        $.each(datajson, function( index, value ) {
	       		$('#pesan').append(index + ": " + value+"<br>")
	          });
			},
		success:function(ok){

				 $('#list_pembelian').html(ok);
				 $('#result').html('');
				 $('#kode_barang').val('').focus();			
			
			// tampilkan notif
			 // swal({
			 // title : 'success',
			 // text : 'data telah ditambahkan',
			 // type : 'success'
			 // }, function(){
			 // //window.location.reload();
				//  $('#cart').html(ok);
				//  $('#result').html('');
				//  $('#kode_barang').val('').focus();

			 // });
		}
	})
});

     $('#jml').keypress(function(e) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
            a.push(i);
            a.push(8);

            //digunakan untuk karakter koma
            // a.push(44);
            
            if (!(a.indexOf(k)>=0))
                e.preventDefault();
            });

 

$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>


