{{-- http://jquerypriceformat.com/ --}}
<script src="/plugins/Jquery-Price-Format/jquery.price_format.js"></script>




<div class="form-group">
      <label for="bayar">Nominal Pembayaran :</label>
      <input type="text" id="bayar" class="form-control" placeholder="nominal yg dibayarkan...">
</div>

<div class="form-group">
      <label for="diskon">Potongan/Diskon :</label>
      <input type="text" id="diskon" class="form-control" placeholder="potongan harga atau diskon...">
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

