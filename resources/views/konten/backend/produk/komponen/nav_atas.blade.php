<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($backend_produk_home)) class="active" @endif>
  	<a href="{!! route('backend_produk.index') !!}">
  		<i class='fa fa-shopping-bag'></i> Produk
  	</a>
  </li>

  <li role="presentation" @if(isset($produk_stok_kosong)) class="active" @endif>
      <a href="{!! route('backend_produk.stok_kosong.index') !!}">
          <i class='fa fa-refresh'></i> Produk Stok Kosong
      </a>
  </li>
 
 @if(Auth::user()->ref_user_level_id == 1)

  <li role="presentation" @if(isset($backend_ref_produk)) class="active" @endif>
      <a href="{!! route('backend_ref_produk.index') !!}">
          <i class='fa fa-th-list'></i> Jenis Produk
      </a>
  </li>

  <li role="presentation" @if(isset($backend_ref_satuan_produk)) class="active" @endif>
      <a href="{!! route('backend_ref_satuan_produk.index') !!}">
          <i class='fa fa-th-list'></i> Jenis Satuan Produk
      </a>
  </li>
@endif

  


</ul>