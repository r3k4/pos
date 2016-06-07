<div class="col-md-6">

	<div class="form-group">
		{!! Form::label('nama_aplikasi', 'Nama Aplikasi : ') !!}
		{!! Form::text('nama_aplikasi', $sv->getByVariable('nama_aplikasi')->value, ['id' => 'nama_aplikasi', 'class' => 'form-control']) !!}
	</div>	

</div>
