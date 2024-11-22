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
		<form id="stokForm">
			<div class="form-group">
				<label for="stok_barang">Edit Stok :</label>
				<input type="text" id="stok_barang" name="stok_barang" class="form-control" placeholder="stok barang..." value="{{ $produk->stok_barang }}">
			</div>

			<div class="form-group">
				<label for="keterangan">Keterangan :</label>
				<select id="keterangan" name="keterangan" class="form-control">
					@foreach($keterangan as $key => $value)
						<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<button type="button" id="simpan" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> SIMPAN</button>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

	let stok_barang = $('#stok_barang').val();
	let form_data = {
		mst_produk_id : {!! $produk->id !!},
		stok_barang : stok_barang,
		keterangan : $('#keterangan').val(),
		_token : '{!! csrf_token() !!}'
	};

	$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_produk.update_stok_barang") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
			$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
			let datajson = JSON.parse(xhr.responseText);
			$.each(datajson, function(index, value) {
				$('#pesan').append(index + ": " + value + "<br>");
			});
		},
		success:function(ok){
			swal({
				title : 'success',
				text : 'data telah tersimpan!',
				type : 'success'
			}, function(){
				window.location.reload();
			});
		}
	});
});

$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
});

$('#stok_barang').keypress(function(e) {
	let a = [];
	let k = e.which;

	for (let i = 48; i < 58; i++)
		a.push(i);
	a.push(8);

	if (!(a.indexOf(k) >= 0))
		e.preventDefault();
});
</script>
