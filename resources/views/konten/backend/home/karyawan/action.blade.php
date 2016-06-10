<i style='cursor:pointer;' class='fa fa-times' id='delItem{!! $list->rowid !!}'></i>


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