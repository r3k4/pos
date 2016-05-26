 

<button class='btn btn-primary pull-right' id='add'> 
	<i class='fa fa-plus-square'></i> Tambah Produk
</button>
<script type="text/javascript">
$('#add').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend_produk.create") }}');
})
</script>
