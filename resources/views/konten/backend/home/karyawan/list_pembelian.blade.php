@if(Cart::count() != 0 )

	<table class="table table-bordered table-hover">
		<thead>
			<tr class="alert-info">
				<th>Nama</th>
				<th>Jml</th>
				<th>harga</th>
				<th>subtotal</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach(Cart::content() as $list)
			<tr>
				<td>{!! $list->name !!}</td>
				<td>{!! $list->qty !!}</td>
				<td>
					{!! fungsi()->rupiah($list->price) !!}
				</td>
				<td>
					{!! fungsi()->rupiah($list->subtotal) !!}				
				</td>
				<td class="text-center">
					<i style='cursor:pointer;' class='fa fa-times' id='delItem{!! $list->rowid !!}'></i>
				</td>
			</tr>


	<script type="text/javascript">
	$('#delItem{{ $list->rowid }}').click(function(){


		swal({
			title : 'are you sure ?',
			type  : 'warning',
			closeOnCancel: true,
			showCancelButton: true,
			closeOnConfirm: false,
			showLoaderOnConfirm : true
			
		}, function(isConfirm){
			if(isConfirm){
				$.ajax({
					url : '{{ route("backend_home.remove_item") }}',
					data : {rowid : '{{ $list->rowid }}', _token : '{!! csrf_token() !!}' },
					type : 'post',
					error: function(err){
						swal('error', 'terjadi kesalahan pada sisi server!', 'error');
					},
					success:function(ok){
						swal({
						title : "success!", 
						text : "data telah terhapus!", 
						type : "success"
						}, function(){
							$('#list_pembelian').html(ok);
							// window.location.reload();
						})
					}
				})		
			}
		});





	});
	</script>





		@endforeach
		<tr class="well">
			<th colspan="3">
				Jumlah total
			</th>
			<th>
				{!! fungsi()->rupiah(Cart::total()) !!}
			</th>
			<th><br></th>
		</tr>

		</tbody>
	</table>

@else
	<div class="alert alert-info">
		<h3>Pesanan masih kosong</h3>
	</div>
@endif