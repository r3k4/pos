<h1 id="loading_search" style="display:none;" class="pull-right">
	<i class='fa fa-refresh fa-spin' ></i>	
</h1>
<h3>
	<i class='fa fa-search'></i> Search Produk
</h3>
<hr>

<div class="row">
	<div id="pesan" class="col-md-12"></div>
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label('nama_produk', 'Pencarian Produk : ') !!}
			{!! Form::text('nama_produk', '', ['id' => 'nama_produk', 'placeholder' => 'search by nama produk...', 'class' => 'form-control' ]) !!}
		</div>
	</div>


	<div class="col-md-12" id="result"></div>
</div>

 
 
 
 
 
 
 
 <script type="text/javascript">
 $('#nama_produk').keypress(function(e) {
     if(e.which == 13) {

     	nama_produk = $.trim($('#nama_produk').val());
     	if(nama_produk == ''){
     		return false;
     	}

     	$('#loading_search').fadeIn();
     	form_data_search = {
		 	nama_produk : nama_produk,
		  	_token : '{!! csrf_token() !!}'     		
     	}
     	// tekan enter
     	$.ajax({
     		url : '{!! route("backend_home.submit_search_produk") !!}',
     		data : form_data_search,
     		type : 'post',
	 		error:function(xhr, status, error){
	 			$('#loading_search').hide();
	 			$('#simpan').removeAttr('disabled');
		 	 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
		         datajson = JSON.parse(xhr.responseText);
		         $.each(datajson, function( index, value ) {
		        		$('#pesan').append(index + ": " + value+"<br>")
		           });
		 		},
	 		success:function(ok){
	 			$('#loading_search').hide();
	 			$('#result').html(ok);
	 		}
     	}) 
     }
 });



 $('#pesan').click(function(){
 	$('#pesan').fadeOut(function(){
 		$('#pesan').html('').show().removeClass('alert alert-danger');
 	});
 })
 
 </script>
 
 
 