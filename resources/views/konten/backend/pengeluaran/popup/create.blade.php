<h3>
	<i class="fa fa-plus-square"></i> Tambah pengeluaran
</h3>

<hr>

<div class="row">
	<div class="col-md-12">
	<div id="pesan"></div>
		<div class="form-group">
			{!! Form::label('nama', "Nama Pengeluaran : ") !!}
			{!! Form::text('nama', '', ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'nama pengeluaran...']) !!}
		</div>		
	</div>


	<div class="row">
		<div class="col-md-12">		 
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('biaya', "Harga/Biaya : ") !!}
					{!! Form::text('biaya', '', ['id' => 'biaya', 'class' => 'form-control', 'placeholder' => 'biaya...']) !!}
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					{!! Form::label('jumlah', "Jumlah : ") !!}
					{!! Form::text('jumlah', 1, ['id' => 'jumlah', 'class' => 'form-control', 'placeholder' => 'jumlah...']) !!}
				</div>		
			</div>	
			<div class="col-md-2">
				<div class="form-group">
					{!! Form::label('subtotal_biaya', "subtotal : ") !!}
					{!! Form::text('subtotal_biaya', '', [ 'readonly' => 1, 'id' => 'subtotal_biaya', 'class' => 'form-control' ]) !!}
				</div>		
			</div>
		</div>
	</div>

	<div class="col-md-12">
		{!! Form::label('keterangan', "Note : ") !!}
		{!! Form::textarea('keterangan', '', ['id' => 'keterangan', 'class' => 'form-control', 'placeholder' => 'keterangan...', 'style' => 'height:100px;']) !!}
	<hr>
	

	<div class="form-group">
	<button id='simpan' class='btn btn-info pull-right '><i class='fa fa-floppy-o'></i> SIMPAN</button>	
	</div>


	</div>


</div>




<script type="text/javascript">

 $('#jumlah').keypress(function(e) {
        var a = [];
        var k = e.which;

        for (i = 48; i < 58; i++)
        a.push(i);
        a.push(8);
        if (!(a.indexOf(k)>=0))
            e.preventDefault();
        });

 $('#biaya').keypress(function(e) {
        var a = [];
        var k = e.which;

        for (i = 48; i < 58; i++)
        a.push(i);
        a.push(8);
        if (!(a.indexOf(k)>=0))
            e.preventDefault();
        });




$('#biaya').keyup(function(){
	jml = $('#jumlah').val();
	biaya = $('#biaya').val();
	$('#subtotal_biaya').val(biaya * jml);
});

$('#jumlah').keyup(function(){
	jml = $('#jumlah').val();
	biaya = $('#biaya').val();
	$('#subtotal_biaya').val(biaya * jml);
});


$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');




form_data ={
	nama : $('#nama').val(),
	biaya : $('#biaya').val(),
	jumlah : $('#jumlah').val(),
	subtotal_biaya : $('#subtotal_biaya').val(),
	keterangan : $('#keterangan').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_pengeluaran.store") }}',
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
			 	text : 'data telah ditambahkan',
			 	type : 'success'
			 }, function(){
			 	window.location.reload();
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


