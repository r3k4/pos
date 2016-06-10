<button class='btn btn-info pull-right' id='export_excel_filter'>
	 <i class='fa fa-file-excel-o'></i> export excel
</button>
<script type="text/javascript">
$('#export_excel_filter').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend_transaksi_karyawan.filter_export") }}');
})
</script>
