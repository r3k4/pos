<nav class="nav-sidebar">
    <ul class="nav">
    
        <li @if(isset($backend_home)) class="active" @endif>
        	<a href="{!! route('backend_home.index') !!}">
        		<i class='fa fa-home'></i> Home
        	</a>
        </li>


        <li @if(isset($backend_produk)) class="active" @endif>
        	<a href="{!! route('backend_produk.index') !!}">
        		<i class='fa fa-shopping-cart'></i> Produk
        	</a>
        </li>


        <li @if(isset($backend_cabang)) class="active" @endif>
            <a href="{!! route('backend_cabang.index') !!}">
                <i class='fa fa-sitemap'></i> Cabang
            </a>
        </li>



        <li @if(isset($backend_ref_produk)) class="active" @endif>
            <a href="{!! route('backend_ref_produk.index') !!}">
                <i class='fa fa-th-list'></i> Jenis Produk
            </a>
        </li>



 
    </ul>
</nav>