<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($pengeluaran_home)) class="active" @endif >
  	<a href="{!!  route('backend_pengeluaran.index') !!}"> 
  		<i class='fa fa-tag'></i> Pengeluaran
  	</a>
  </li>

  <li role="presentation" @if(isset($pengeluaran_statistik)) class="active" @endif >
  	<a href="{!!  route('backend_pengeluaran.statistik') !!}"> 
  		<i class='fa fa-bar-chart'></i> Statistik 
  	</a>
  </li>

</ul>