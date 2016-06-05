
<div class="form-group">
	{!! Form::label('password_lama', 'Password Lama : ') !!}
	<i class='fa fa-question-circle' data-toggle='tooltip' title='kosongkan jika tidak ingin merubahnya'></i>
	{!! Form::password('password_lama', ['id' => 'password_lama', 'class' => 'form-control', 'placeholder' => 'password lama...']) !!}
</div>


<div class="form-group">
	{!! Form::label('password_baru', 'Password Baru : ') !!}
	{!! Form::password('password_baru', ['id' => 'password_baru', 'class' => 'form-control', 'placeholder' => 'password baru...']) !!}
</div>

<div class="form-group">
	{!! Form::label('password_baru_confirmation', 're-enter Password Baru : ') !!}
	{!! Form::password('password_baru_confirmation', ['id' => 'password_baru_confirmation', 'class' => 'form-control', 'placeholder' => 'password br confirmation...']) !!}
</div>