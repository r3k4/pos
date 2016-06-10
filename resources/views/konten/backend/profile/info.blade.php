<div class="alert alert-info">
	<h3>
		<i class='fa fa-exclamation-circle'></i> Info pengguna
	</h3>
	<table class="table">
		<tr>
			<td>
				Level
			</td>
			<td>
				{!! Auth::user()->fk__ref_user_level !!}
			</td>
		</tr>
		@if(Auth::user()->fk__mst_cabang != '')
		<tr>
			<td>
				Cabang
			</td>
			<td>
				{!! Auth::user()->fk__mst_cabang !!}
			</td>
		</tr>
		@endif
	</table>
</div>