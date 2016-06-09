@inject('cabang_repo', 'App\Repositories\Contracts\Mst\CabangRepoInterface')
<li class="dropdown" >
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        Pilih Cabang <span class="caret"></span>
    </a>


    <ul class="dropdown-menu" role="menu">
   		<li @if(!Session::has('mst_cabang_id')) class="active" @endif>
   			<a href="{{ url('/logout') }}">
   				<i class='fa fa-sitemap'></i> Semua Cabang
   			</a>
   		</li>
        <li role="separator" class="divider"></li>    
        @foreach( $cabang_repo->all() as $list_cabang_repo)
       	 <li>
       	 	<a href="{{ url('/logout') }}">
       	 		<i class="fa fa-th-list"></i> {!! $list_cabang_repo->nama !!}
       	 	</a>
       	 </li>
        @endforeach
    </ul>
</li>