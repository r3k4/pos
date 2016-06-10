
<button style="margin-right:1em;" class='btn btn-primary pull-right' id='import_produk'> 
	<i class='fa fa-cloud-upload'></i> import data
</button>
<script type="text/javascript">
$('#import_produk').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend_produk.import") }}');
})
</script>
