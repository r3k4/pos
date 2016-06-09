<h3>
	<i class="fa fa-plus-square"></i> Edit pengeluaran
</h3>

<hr>

<div class="row">
	<div class="col-md-12">
	<div id="pesan"></div>
		<div class="form-group">
			{!! Form::label('nama', "Nama Pengeluaran : ") !!}
			{!! Form::text('nama', $pengeluaran->nama, ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'nama pengeluaran...']) !!}
		</div>		
	</div>


	<div class="row">
		<div class="col-md-12">		 
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('biaya', "Harga/Biaya : ") !!}
					{!! Form::text('biaya', $pengeluaran->biaya, ['id' => 'biaya', 'class' => 'form-control', 'placeholder' => 'biaya...']) !!}
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					{!! Form::label('jumlah', "Jumlah : ") !!}
					{!! Form::text('jumlah',$pengeluaran->jumlah, ['id' => 'jumlah', 'class' => 'form-control', 'placeholder' => 'jumlah...']) !!}
				</div>		
			</div>	
			<div class="col-md-4">
				<div class="form-group">
					{!! Form::label('subtotal_biaya', "subtotal : ") !!}
					{!! Form::text('subtotal_biaya', $pengeluaran->subtotal_biaya, [ 'readonly' => 1, 'id' => 'subtotal_biaya', 'class' => 'form-control' ]) !!}
				</div>		
			</div>
			@if(\Auth::user()->ref_user_level_id == 1)
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('mst_cabang_id', "Cabang : ") !!}
						{!! Form::select('mst_cabang_id', $cabang, $pengeluaran->mst_cabang_id, ['id' => 'mst_cabang_id', 'class' => 'form-control']) !!}
					</div>		
				</div>
			@else
				{!! Form::hidden('mst_cabang_id',  \Auth::user()->mst_cabang_id, ['id' => 'mst_cabang_id']) !!}
			@endif
		</div>
		<div class="col-md-12">
 
			<div class="col-md-6">
				<div class="form-group">
				{!! Form::label('tgl_pengeluaran', 'Tanggal pengeluaran:') !!}
				    <div class='input-group date' id='datetimepicker2'>
				        <input id="tgl_pengeluaran" value="{!! $pengeluaran->tgl_pengeluaran !!}" readonly="0" type='text' class="form-control" />
				        <span class="input-group-addon">
				            <span class="fa fa-calendar"></span>
				        </span>
				    </div>
				</div>				
			</div>			
		</div>
	</div>

	<div class="col-md-12">
		{!! Form::label('keterangan', "Note : ") !!}
		{!! Form::textarea('keterangan', $pengeluaran->keterangan, ['id' => 'keterangan', 'class' => 'form-control', 'placeholder' => 'keterangan...', 'style' => 'height:100px;']) !!}
	<hr>
	

	<div class="form-group">
	<button id='simpan' class='btn btn-info pull-right '><i class='fa fa-floppy-o'></i> SIMPAN</button>	
	</div>


	</div>


</div>




<script type="text/javascript">

	$(function () {
	    $('#datetimepicker2').datetimepicker({
	    	locale: 'id',
	    	ignoreReadonly : true,
	    	// viewMode: 'years',
	    	format: 'YYYY-MM-DD',
	        icons: {
	            time: "fa fa-clock-o",
	            next: "fa fa-arrow-right",
	            previous: "fa fa-arrow-left",
	            date: "fa fa-calendar",
	            up: "fa fa-arrow-up",
	            down: "fa fa-arrow-down"
	        }		        	
	    });
	});


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
	mst_cabang_id = $('#mst_cabang_id').val();
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
	mst_user_id : {!! Auth::user()->id !!},
	tgl_pengeluaran : $('#tgl_pengeluaran').val(),
	mst_cabang_id : $('#mst_cabang_id').val(),
	nama : $('#nama').val(),
	biaya : $('#biaya').val(),
	jumlah : $('#jumlah').val(),
	subtotal_biaya : $('#subtotal_biaya').val(),
	keterangan : $('#keterangan').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_pengeluaran.update", $pengeluaran->id) }}',
		data : form_data,
		type : 'put',
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


