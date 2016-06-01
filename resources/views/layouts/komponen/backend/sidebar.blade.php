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


        <li @if(isset($backend_pengeluaran)) class="active" @endif>
            <a href="{!! route('backend_pengeluaran.index') !!}">
                <i class='fa fa-tags'></i> Pengeluaran
            </a>
        </li>


@if(\Auth::user()->ref_user_level_id == 1)

        <li @if(isset($backend_cabang)) class="active" @endif>
            <a href="{!! route('backend_cabang.index') !!}">
                <i class='fa fa-sitemap'></i> Cabang
            </a>
        </li>

 
        <li @if(isset($backend_user)) class="active" @endif>
            <a href="{!! route('backend_user.index') !!}">
                <i class='fa fa-group'></i> Pengguna
            </a>
        </li>
@endif
 

 
    </ul>
</nav>