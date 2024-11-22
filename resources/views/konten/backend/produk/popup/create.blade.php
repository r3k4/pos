<div class="row">
	<div class="col-md-12">
		<h2>
			<i class="fa fa-plus-square"></i> Menambahkan Produk
		</h2>
		<hr>
		<div id="pesan"></div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="nama">Nama Produk :</label>
					<input type="text" class="form-control" id="nama" placeholder="nama produk...">
				</div>
				<div class="form-group">
					<label for="barcode">Barcode :</label>
					<input type="text" class="form-control" id="barcode" placeholder="barcode...">
				</div>
				<div class="form-group">
					<label for="ref_produk_id">Jenis Produk :</label>
					<select id="ref_produk_id" class="form-control">
						@foreach($ref_produk as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="harga_beli">Harga Beli :</label>
					<input type="text" class="form-control" id="harga_beli" placeholder="Harga Beli...">
				</div>
				<div class="form-group">
					<label for="harga_jual">Harga Jual :</label>
					<input type="text" class="form-control" id="harga_jual" placeholder="Harga Jual...">
				</div>
				<div class="form-group">
					<label for="harga_reseller">Harga Re-seller :</label>
					<input type="text" class="form-control" id="harga_reseller" placeholder="Harga Re-seller...">
				</div>
				<div class="form-group">
					<label for="stok_barang">Stok Barang :</label>
					<input type="text" class="form-control" id="stok_barang" placeholder="Stok Barang...">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="ref_satuan_produk_id">Satuan Barang :</label>
					<select id="ref_satuan_produk_id" class="form-control">
						@foreach($satuan_barang as $key => $value)
							<option value="{{ $key }}">{{ $value }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan Produk :</label>
					<textarea class="form-control" id="keterangan" placeholder="keterangan produk..." style="height:70px"></textarea>
				</div>
				@if(Auth::user()->ref_user_level_id == 1)
					<div class="form-group">
						<label for="mst_cabang_id">Cabang :</label>
						<select id="mst_cabang_id" class="form-control">
							@foreach($mst_cabang as $key => $value)
								<option value="{{ $key }}">{{ $value }}</option>
							@endforeach
						</select>
					</div>
				@else
					<input type="hidden" id="mst_cabang_id" value="{{ Auth::user()->mst_cabang_id }}">
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

	var form_data = {
		mst_user_id : '{{ Auth::user()->id }}',
		barcode : $('#barcode').val(),
		harga_beli : $('#harga_beli').val(),
		harga_jual : $('#harga_jual').val(),
		harga_reseller : $('#harga_reseller').val(),
		stok_barang : $('#stok_barang').val(),
		ref_satuan_produk_id : $('#ref_satuan_produk_id').val(),
		nama : $('#nama').val(),
		ref_produk_id : $('#ref_produk_id').val(),
		mst_cabang_id : $('#mst_cabang_id').val(),
		keterangan : $('#keterangan').val(),
		_token : '{{ csrf_token() }}'
	};

	$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_produk.store") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
			$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
			var datajson = JSON.parse(xhr.responseText);
			$.each(datajson, function(index, value) {
				$('#pesan').append(index + ": " + value + "<br>");
			});
		},
		success:function(ok){
			swal({
				title : 'success',
				text : 'data telah tersimpan',
				type : 'success'
			}, function(){
				window.location.href = '{{ route("backend_produk.index") }}';
			});
		}
	});
});

$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
});
</script>
