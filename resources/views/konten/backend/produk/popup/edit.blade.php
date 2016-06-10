 
 
<div class="row">
	

<div class="col-md-12">
<h2>
	<i class="fa fa-pencil-square"></i> Edit Produk 
</h2>

 
<hr>


<div id="pesan"></div>

	<div class="row">
		<div class="col-md-4">		
			<div class="form-group">
				{!! Form::label('nama', 'Nama Produk : ') !!}
				{!! Form::text('nama', $produk->nama, ['class' => 'form-control', 'id'	=> 'nama', 'placeholder' => 'nama produk...']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('barcode', 'Barcode : ') !!}
				{!! Form::text('barcode', $produk->barcode, ['class' => 'form-control', 'id'	=> 'barcode', 'placeholder' => 'barcode...']) !!}
			</div>


			<div class="form-group">
				{!! Form::label('ref_produk_id', 'Jenis Produk : ') !!}
				{!! Form::select('ref_produk_id', 
								 $ref_produk, 
								 $produk->ref_produk_id, 
								 ['id'	=> 'ref_produk_id', 
								  'class' => 'form-control'
								  ]
							) !!}
			</div>
 

		</div>

		<div class="col-md-4">

 

			<div class="form-group">
				{!! Form::label('harga_beli', 'Harga Beli : ') !!}
				{!! Form::text('harga_beli', $produk->harga_beli, ['class' => 'form-control', 'id'	=> 'harga_beli', 'placeholder' => 'Harga Beli...']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('harga_jual', 'Harga Jual : ') !!}
				{!! Form::text('harga_jual', $produk->harga_jual, ['class' => 'form-control', 'id'	=> 'harga_jual', 'placeholder' => 'Harga Jual...']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('harga_reseller', 'Harga Re-seller : ') !!}
				{!! Form::text('harga_reseller', $produk->harga_reseller, ['class' => 'form-control', 'id'	=> 'harga_reseller', 'placeholder' => 'Harga Re-seller...']) !!}
			</div>
 

		</div>
		<div class="col-md-4">
			<div class="form-group">
				{!! Form::label('ref_satuan_produk_id', 'Satuan Barang : ') !!}
				{!! Form::select('ref_satuan_produk_id', 
								 $satuan_barang, 
								 $produk->ref_satuan_produk_id, 
								 ['id'	=> 'ref_satuan_produk_id', 
								  'class' => 'form-control'
								  ]
							) !!}
			</div>


			<div class="form-group">
				{!! Form::label('keterangan', 'keterangan Produk : ') !!}
				{!! Form::textarea('keterangan', $produk->keterangan, ['class' => 'form-control', 'id'	=> 'keterangan', 'placeholder' => 'keterangan produk...', 'style' => 'height:70px']) !!}
			</div>

			@if(Auth::user()->ref_user_level_id == 1)
						<div class="form-group">
							{!! Form::label('mst_cabang_id', 'Cabang : ') !!}
							{!! Form::select('mst_cabang_id', 
											 $mst_cabang, 
											 $produk->mst_cabang_id, 
											 ['id'	=> 'mst_cabang_id', 
											  'class' => 'form-control'
											  ]
										) !!}
						</div>

			@else 
				{!! Form::hidden('mst_cabang_id', \Auth::user()->mst_cabang_id, ['id' => 'mst_cabang_id']) !!}
			@endif

		</div>

		<div class="col-md-12">
			<hr>
			<button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>
		</div>
		
	</div>
</div>
	


 </div>



<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');


form_data ={
	id 			: {!! $produk->id !!},
	barcode : $('#barcode').val(),
	harga_beli : $('#harga_beli').val(),
	harga_jual : $('#harga_jual').val(),
	harga_reseller : $('#harga_reseller').val(),
	ref_satuan_produk_id : $('#ref_satuan_produk_id').val(),
	nama : $('#nama').val(),
	ref_produk_id : $('#ref_produk_id').val(),
	mst_cabang_id : $('#mst_cabang_id').val(),
	keterangan : $('#keterangan').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_produk.update") }}',
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
			 	text : 'data telah tersimpan',
			 	type : 'success'
			 }, function(){
			 	window.location.href = '{!! route("backend_produk.index") !!}';
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


