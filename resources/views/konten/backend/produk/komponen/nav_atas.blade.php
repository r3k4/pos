<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($backend_produk_home)) class="active" @endif>
  	<a href="{!! route('backend_produk.index') !!}">
  		Produk
  	</a>
  </li>


  <li role="presentation" @if(isset($backend_detail_produk_home)) class="active" @endif>
  	<a href="{!! route('backend_detail_produk.index') !!}">
  		Daftar Item Produk
  	</a>
  </li>

</ul>