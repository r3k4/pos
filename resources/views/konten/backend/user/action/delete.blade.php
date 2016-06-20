<i class='fa fa-times' style='cursor:pointer;' id='del{{ $list->id }}'></i>

<script type="text/javascript">

$('#del{{ $list->id }}').click(function(){
	swal({   
		title: "Are you sure?",   
		type: "warning",  
		'text' : 'data yg berhubungan dgn user ini akan terhapus, termasuk data produk dan transaksi yg pernah dilakukan oleh user ini', 
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		closeOnConfirm: false }, function(){   

			$.ajax({
				url : '{{ route("backend_user.delete") }}',
				data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
				type : 'post',
				error: function(err){
					alert('error! terjadi sesuatu pada sisi server!');
				},
				success:function(ok){
					swal({
						title : "Deleted!",
						type :  "success"
					}, function(){
						window.location.reload();				
					}); 
				}
			});
	});

});


 </script>