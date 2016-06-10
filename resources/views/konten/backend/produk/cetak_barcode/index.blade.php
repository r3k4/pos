<<!DOCTYPE html>
<html>
<head>
	<title>Barcode - {!! $produk->nama !!} @if(empty($produk->barcode)) - SKU @endif </title>
<style type="text/css">
	@page { margin: 5px; }
	body { 
			margin: 5px; 
			font-size: 10px;
		}
	.barcode_produk{
		float:right;
		/*border : 1px solid #aaa; */
		width:220px; 
		text-align:center;		
		margin: 1em;
	}
</style>

</head>
<body>
	@for($i=1;$i<=$jml;$i++)	
			@if(!empty($produk->barcode))
 					{!! '<img class="barcode_produk" src="data:image/png;base64,' . DNS1D::getBarcodePNG($produk->barcode, "C128") . '" alt="barcode"   />' !!}
 			@else
 					{!! '<img class="barcode_produk" src="data:image/png;base64,' . DNS1D::getBarcodePNG($produk->sku, "C128") . '" alt="barcode"   />' !!}
			@endif
	@endfor
 
</body>
</html>
  



