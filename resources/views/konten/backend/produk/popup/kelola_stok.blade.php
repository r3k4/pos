<h3>
	Kelola Stok Barang
</h3>
<hr>



<div class="row">

	<div class="col-md-12">
		<div id="pesan"></div>
	</div>

	<div class="col-md-6">
		<table class="table">
			<tr>
				<td>
					SKU
				</td>
				<td>
					{!! $produk->sku !!}
				</td>
			</tr>

			<tr>
				<td width="200px">
					Nama Produk
				</td>
				<td>
					{!! $produk->nama !!}
				</td>
			</tr>

			<tr>
				<td>
					Stok Tersedia
				</td>
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
		</table>		
	</div>	
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('stok_barang', 'Edit Stok : ') !!}
			{!!  Form::text('stok_barang', $produk->stok_barang, ['id' => 'stok_barang', 'class' => 'form-control', 'placeholder' => 'stok barang...'])  !!}
		</div>

		<div class="form-group">
			{!! Form::label('keterangan', 'Keterangan : ') !!}
			{!! Form::select('keterangan', $keterangan, '', ['']) !!}
		</div>


		<div class="form-group">
			<button id='simpan' class='btn btn-primary pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>
		</div>
	</div>
</div>

 


<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

	stok_barang = $('#stok_barang').val()
 



form_data ={
	mst_produk_id : {!! $produk->id !!},
	stok_barang : stok_barang,
	keterangan	 : $('#keterangan').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_produk.update_stok_barang") }}',
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
			 	text : 'data telah tersimpan!',
			 	type : 'success'
			 }, function(){
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


     $('#stok_barang').keypress(function(e) {
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


</script>


