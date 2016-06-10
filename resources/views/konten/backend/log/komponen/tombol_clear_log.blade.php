
<button class='btn btn-primary pull-right'id='do_clear_log'> 
	<i class='fa fa-refresh'></i> clear log
</button>


<script type="text/javascript">
$('#do_clear_log').click(function(){


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
				url : '{{ route("backend_log.clear_log") }}',
				data : {clear_log : 1, _token : '{!! csrf_token() !!}' },
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
						window.location.reload();
					})
				}
			})		
		}
	});





});
</script>


