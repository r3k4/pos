<ol class="breadcrumb">
	<li>
		<a href="{!! route('backend_detail_produk.index') !!}">Item Produk</a>
	</li>
	<li class="active">Create</li>
</ol>
<hr>


<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('nama', 'Nama Item : ') !!}
		{!! Form::text('nama', '', ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'nama item produk..']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('barcode', 'Barcode : ') !!}
		{!! Form::text('barcode', '', ['id' => 'barcode', 'class' => 'form-control', 'placeholder' => 'barcode..']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('mst_produk_id', 'Produk : ') !!}
		{!! Form::select('mst_produk_id', $mst_produk, '', ['id' => 'mst_produk_id', 'class' => 'form-control']) !!}
	</div>
</div>



<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('harga_beli', 'Harga Beli : ') !!}
		{!! Form::text('harga_beli', '', ['id' => 'harga_beli', 'class' => 'form-control', 'placeholder' => 'harga beli..']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('harga_jual', 'Harga Jual : ') !!}
		{!! Form::text('harga_jual', '', ['id' => 'harga_jual', 'class' => 'form-control', 'placeholder' => 'harga jual..']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('harga_reseller', 'Harga reseller : ') !!}
		{!! Form::text('harga_reseller', '', ['id' => 'harga_reseller', 'class' => 'form-control', 'placeholder' => 'harga reseller..']) !!}
	</div>
</div>


<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('stok_barang', 'Stok barang : ') !!}
		{!! Form::text('stok_barang', '', ['id' => 'stok_barang', 'class' => 'form-control', 'placeholder' => 'Stok barang..']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('mst_cabang_id', 'Cabang : ') !!}
		{!! Form::select('mst_cabang_id', $mst_cabang, '', ['id' => 'mst_cabang_id', 'class' => 'form-control']) !!}
	</div>

</div>