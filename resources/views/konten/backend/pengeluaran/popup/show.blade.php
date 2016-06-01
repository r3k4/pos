@can('updatePengeluaran', $pengeluaran)
	<button class="btn btn-primary pull-right" id="edit_pengeluaran">
		<i class='fa fa-pencil-square'></i> edit
	</button>
@endcan
<h3>
	<i class='fa fa-eye'></i> Show Detail Pengeluaran
</h3>
<hr>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<tr>
				<td width="190px">
					Nama Pengeluaran
				</td>
				<td width="10px">:</td>
				<td>
					{!! $pengeluaran->nama !!}
				</td>
			</tr>

			<tr>
				<td>
					Harga/Biaya
				</td>
				<td width="10px">:</td>
				<td>
					@ {!! fungsi()->rupiah($pengeluaran->biaya) !!}
				</td>
			</tr>

			<tr>
				<td>
					jumlah
				</td>
				<td width="10px">:</td>
				<td>
					{!! $pengeluaran->jumlah !!}
				</td>
			</tr>

			<tr>
				<td>
					Subtotal Harga/biaya
				</td>
				<td width="10px">:</td>
				<td>
					{!! fungsi()->rupiah($pengeluaran->subtotal_biaya) !!}
				</td>
			</tr>

			<tr>
				<td>
					user
				</td>
				<td width="10px">:</td>
				<td>
					 {!! $pengeluaran->fk__mst_user !!}
				</td>
			</tr>

			<tr>
				<td>
					Keterangan
				</td>
				<td width="10px">:</td>
				<td>
					 {!! $pengeluaran->keterangan !!}
				</td>
			</tr>

		</table>
	</div>
</div>



<script type="text/javascript">
	$('#edit_pengeluaran').click(function(){

		$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
		$('#myModal').modal('show');
		$('.modal-body').load('{{ route("backend_pengeluaran.edit", $pengeluaran->id) }}');

	});
</script>