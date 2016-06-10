<i class='fa fa-eye' id='show_struk{{ $list->id }}' style='cursor:pointer;'></i>

<script type="text/javascript">
$('#show_struk{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend_home.show_single_transaksi", $list->id) }}')

})
</script>

