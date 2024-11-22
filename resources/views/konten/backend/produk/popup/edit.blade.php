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
					<label for="nama">Nama Produk :</label>
					<input type="text" class="form-control" id="nama" name="nama" value="{{ $produk->nama }}" placeholder="nama produk...">
				</div>
				<div class="form-group">
					<label for="barcode">Barcode :</label>
					<input type="text" class="form-control" id="barcode" name="barcode" value="{{ $produk->barcode }}" placeholder="barcode...">
				</div>
				<div class="form-group">
					<label for="ref_produk_id">Jenis Produk :</label>
					<select id="ref_produk_id" name="ref_produk_id" class="form-control">
						@foreach($ref_produk as $key => $value)
							<option value="{{ $key }}" {{ $produk->ref_produk_id == $key ? 'selected' : '' }}>{{ $value }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="harga_beli">Harga Beli :</label>
					<input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{ $produk->harga_beli }}" placeholder="Harga Beli...">
				</div>
				<div class="form-group">
					<label for="harga_jual">Harga Jual :</label>
					<input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{ $produk->harga_jual }}" placeholder="Harga Jual...">
				</div>
				<div class="form-group">
					<label for="harga_reseller">Harga Re-seller :</label>
					<input type="text" class="form-control" id="harga_reseller" name="harga_reseller" value="{{ $produk->harga_reseller }}" placeholder="Harga Re-seller...">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="ref_satuan_produk_id">Satuan Barang :</label>
					<select id="ref_satuan_produk_id" name="ref_satuan_produk_id" class="form-control">
						@foreach($satuan_barang as $key => $value)
							<option value="{{ $key }}" {{ $produk->ref_satuan_produk_id == $key ? 'selected' : '' }}>{{ $value }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan Produk :</label>
					<textarea class="form-control" id="keterangan" name="keterangan" placeholder="keterangan produk..." style="height:70px">{{ $produk->keterangan }}</textarea>
				</div>
				@if(Auth::user()->ref_user_level_id == 1)
					<div class="form-group">
						<label for="mst_cabang_id">Cabang :</label>
						<select id="mst_cabang_id" name="mst_cabang_id" class="form-control">
							@foreach($mst_cabang as $key => $value)
								<option value="{{ $key }}" {{ $produk->mst_cabang_id == $key ? 'selected' : '' }}>{{ $value }}</option>
							@endforeach
						</select>
					</div>
				@else 
					<input type="hidden" id="mst_cabang_id" name="mst_cabang_id" value="{{ Auth::user()->mst_cabang_id }}">
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
		id: {{ $produk->id }},
		barcode: $('#barcode').val(),
		harga_beli: $('#harga_beli').val(),
		harga_jual: $('#harga_jual').val(),
		harga_reseller: $('#harga_reseller').val(),
		ref_satuan_produk_id: $('#ref_satuan_produk_id').val(),
		nama: $('#nama').val(),
		ref_produk_id: $('#ref_produk_id').val(),
		mst_cabang_id: $('#mst_cabang_id').val(),
		keterangan: $('#keterangan').val(),
		_token: '{{ csrf_token() }}'
	};

	$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url: '{{ route("backend_produk.update") }}',
		data: form_data,
		type: 'post',
		error: function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
			$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
			var datajson = JSON.parse(xhr.responseText);
			$.each(datajson, function(index, value) {
				$('#pesan').append(index + ": " + value + "<br>");
			});
		},
		success: function(ok){
			swal({
				title: 'success',
				text: 'data telah tersimpan',
				type: 'success'
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
