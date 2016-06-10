{{-- http://jquerypriceformat.com/ --}}
<script src="/plugins/Jquery-Price-Format/jquery.price_format.js"></script>




<div class="form-group">
	{!! Form::label('bayar', "Nominal Pembayaran : ") !!}
	{!! Form::text('bayar', "", ['id' => 'bayar', 'class' => 'form-control', 'placeholder' => 'nominal yg dibayarkan...']) !!}
</div>

 

<script type="text/javascript">

$(function(){
      $('#bayar').priceFormat({
      prefix: 'Rp ',
      centsSeparator: ',',
      centsLimit: 0,
      thousandsSeparator: '.'
       });
})
 

	     $('#bayar').keypress(function(e) {
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
	

 


</script>

