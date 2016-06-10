@if(Auth::user()->ref_user_level_id == 1)
  @inject('cabang_repo', 'App\Repositories\Contracts\Mst\CabangRepoInterface')
  <li class="dropdown" >
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          Cabang
          @if(Session::has('mst_cabang_id'))
          - {!! $cabang_repo->find(Session::get('mst_cabang_id'))->nama !!}
          @endif
           <span class="caret"></span>
      </a>


      <ul class="dropdown-menu" role="menu">
     		<li @if(!Session::has('mst_cabang_id')) class="active" @endif>
     			<a href="{{ route('backend_home.pilih_cabang', 0) }}">
     				<i class='fa fa-sitemap'></i> Semua Cabang
     			</a>
     		</li>
          <li role="separator" class="divider"></li>    
          @foreach( $cabang_repo->all() as $list_cabang_repo)
         	 <li @if($list_cabang_repo->id == Session::get('mst_cabang_id')) class="active" @endif >
         	 	<a href="{{ route('backend_home.pilih_cabang', $list_cabang_repo->id) }}">
         	 		<i class="fa fa-th-list"></i> {!! $list_cabang_repo->nama !!}
         	 	</a>
         	 </li>
          @endforeach
      </ul>
  </li>
@endif