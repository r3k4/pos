<h3>
	<i class='fa fa-barcode'></i> Cetak Barcode
</h3>
<hr>

<div class="row">
	<div class="col-md-5">
		<div class="form-group">
			{!! Form::label('jml', 'Jumlah barcode : ') !!}
			{!! Form::text('jml', 1, ['id' => 'jml', 'class' => 'form-control', 'placeholder' => 'jml barcode...']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<hr>
		<div class="form-group">
			<button id='do_cetak_barcode' class='btn btn-info'><i class='fa fa-print'></i> CETAK</button>
		</div>
	</div>
</div>


<script type="text/javascript">

	     $('#jml').keypress(function(e) {
	            var a = [];
	            var k = e.which;
	
	            for (i = 48; i < 58; i++)
	            a.push(i);
	            a.push(8);
	
	            //digunakan untuk karakter koma
	            // a.push(44);
	            
	            if (!(a.indexOf(k)>=0))
	                e.preventDefault();
	            });
	


	$('#do_cetak_barcode').click(function(){
		jml = $('#jml').val();
		if(jml == ''){
			return false;
		}

		window.open('{!! route("backend_produk.cetak_barcode", $produk->id) !!}?jml='+jml);

	});
</script>

