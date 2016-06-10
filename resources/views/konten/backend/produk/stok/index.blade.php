@extends('layouts.backend')

@section('konten')
 

<a class="btn btn-primary pull-right" href="{!! URL::previous() !!}">
	<i class='fa fa-arrow-left'></i> back
</a>

<h2>
	<i class="fa fa-shopping-cart"></i> History Stok Produk - {!! '['.$produk->sku.'] '.$produk->nama !!}
</h2>
<hr>

@include($base_view.'list_data') 

 
@endsection
