 
 
<div class="row">
	

<div class="col-md-12">
<h2>
	<i class="fa fa-plus-square"></i> Menambahkan Produk 
</h2>

 
<hr>


<div id="pesan"></div>

	<div class="row">
		<div class="col-md-6">			
			<div class="form-group">
				{!! Form::label('nama', 'Nama Produk : ') !!}
				{!! Form::text('nama', '', ['class' => 'form-control', 'id'	=> 'nama', 'placeholder' => 'nama produk...']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('ref_produk_id', 'Jenis Produk : ') !!}
				{!! Form::select('ref_produk_id', 
								 $ref_produk, 
								 '', 
								 ['id'	=> 'ref_produk_id', 
								  'class' => 'form-control'
								  ]
							) !!}
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('keterangan', 'keterangan Produk : ') !!}
				{!! Form::text('keterangan', '', ['class' => 'form-control', 'id'	=> 'keterangan', 'placeholder' => 'keterangan produk...']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('mst_cabang_id', 'Cabang : ') !!}
				{!! Form::select('mst_cabang_id', 
								 $mst_cabang, 
								 '', 
								 ['id'	=> 'mst_cabang_id', 
								  'class' => 'form-control'
								  ]
							) !!}
			</div>
		</div>
		
	</div>


	<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> SIMPAN</button>
</div>
	


 </div>



<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');


form_data ={
	nama : $('#nama').val(),
	ref_produk_id : $('#ref_produk_id').val(),
	mst_cabang_id : $('#mst_cabang_id').val(),
	keterangan : $('#keterangan').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_produk.store") }}',
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


