<i data-toggle='tooltip' title='kelola stok barang' class='fa fa-refresh' id='kelola_stok{{ $list->id }}' style='cursor:pointer;'></i>

<script type="text/javascript">
$('#kelola_stok{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend_produk.kelola_stok", $list->id) }}')

})
</script>

