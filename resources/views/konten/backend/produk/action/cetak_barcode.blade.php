<i data-toggle='tooltip' title='cetak barcode' class='fa fa-barcode' id='cetak_barcode{{ $list->id }}' style='cursor:pointer;'></i>
<script type="text/javascript">
$('#cetak_barcode{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend_produk.cetak_barcode", $list->id) }}')

})
</script>


