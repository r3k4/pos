<i data-toggle='tooltip' title='reset password' class='fa fa-refresh' style='cursor:pointer;' id='reset_password{{ $list->id }}'></i>

<script type="text/javascript">
$('#reset_password{{ $list->id }}').click(function(){


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
				url : '{{ route("backend_user.reset_password") }}',
				data : {email : '{!! $list->email !!}', id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
				type : 'post',
				error: function(err){
					swal('error', 'terjadi kesalahan pada sisi server!', 'error');
				},
				success:function(ok){
					swal({
					title : "success!", 
					text : "data telah disimpan!", 
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


