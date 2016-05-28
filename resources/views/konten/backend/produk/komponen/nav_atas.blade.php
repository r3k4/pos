<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($backend_produk_home)) class="active" @endif>
  	<a href="{!! route('backend_produk.index') !!}">
  		<i class='fa fa-shopping-bag'></i> Produk
  	</a>
  </li>

 

  <li role="presentation" @if(isset($backend_ref_produk)) class="active" @endif>
      <a href="{!! route('backend_ref_produk.index') !!}">
          <i class='fa fa-th-list'></i> Jenis Produk
      </a>
  </li>


</ul>