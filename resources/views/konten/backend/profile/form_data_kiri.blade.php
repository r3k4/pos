<div class="form-group">
	{!! Form::label('nama', 'Nama : ') !!}
	{!! Form::text('nama', \Auth::user()->nama, ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'nama saya...']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Email : ') !!}
	{!! Form::text('email', \Auth::user()->email, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'email saya...']) !!}
</div>
