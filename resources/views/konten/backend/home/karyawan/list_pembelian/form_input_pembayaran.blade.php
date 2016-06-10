{{-- http://jquerypriceformat.com/ --}}
<script src="/plugins/Jquery-Price-Format/jquery.price_format.js"></script>




<div class="form-group">
	{!! Form::label('bayar', "Nominal Pembayaran : ") !!}
	{!! Form::text('bayar', "", ['id' => 'bayar', 'class' => 'form-control', 'placeholder' => 'nominal yg dibayarkan...']) !!}
</div>


<div class="form-group">
	{!! Form::label('diskon', "Potongan/Diskon : ") !!} 
	{!! Form::text('diskon', "", ['id' => 'diskon', 'class' => 'form-control', 'placeholder' => 'potongan harga atau diskon...']) !!}
</div>

 

<script type="text/javascript">

$(function(){
      $('#bayar').priceFormat({
      prefix: 'Rp ',
      centsSeparator: ',',
      centsLimit: 0,
      thousandsSeparator: '.'
       });

      $('#diskon').priceFormat({
      prefix: 'Rp ',
      centsSeparator: ',',
      centsLimit: 0,
      thousandsSeparator: '.'
       });      
})
 
 
 

 


</script>

