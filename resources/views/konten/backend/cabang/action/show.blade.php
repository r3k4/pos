<i class='fa fa-eye' id='show{{ $list->id }}' style='cursor:pointer;'></i>
<script type="text/javascript">
$('#show{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend_cabang.show", $list->id) }}')

})
</script>

