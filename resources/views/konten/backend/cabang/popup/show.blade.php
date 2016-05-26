
<button class='btn btn-primary pull-right' id='edit_cabang'>
	<i class='fa fa-pencil-square'></i> edit</button>
<script type="text/javascript">
$('#edit_cabang').click(function(){
	$('.modal-body').load('{{ route("backend_cabang.edit", Request::segment(3)) }}');
})
</script>


<h1>
	<i class='fa fa-eye'></i> View Data Cabang
</h1>
<hr>

<table class="table">
	<tr>
		<td width="160px">
			Nama Cabang
		</td>
		<td>
			{!! $cabang->nama !!}
		</td>
	</tr>

	<tr>
		<td>
			Kode Cabang
		</td>
		<td>
			{!! $cabang->kode_cabang !!}
		</td>
	</tr>


	<tr>
		<td>
			Nomor Telepon
		</td>
		<td>
			{!! $cabang->no_tlp !!}
		</td>
	</tr>

	<tr>
		<td>
			Alamat
		</td>
		<td>
			{!! $cabang->alamat !!}
		</td>
	</tr>

	<tr>
		<td>
			Keterangan tambahan
		</td>
		<td>
			{!! $cabang->keterangan !!}
		</td>
	</tr>



</table>