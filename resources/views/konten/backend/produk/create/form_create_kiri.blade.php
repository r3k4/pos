

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