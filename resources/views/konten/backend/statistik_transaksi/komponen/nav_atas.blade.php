<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($statistik_bulanan_home)) class="active" @endif>
  	<a href="{!! route('backend_statistik_transaksi.index') !!}">
  		<i class="fa fa-bar-chart"></i> Bulanan
  	</a>
  </li>

  <li role="presentation" @if(isset($statistik_tahunan_home)) class="active" @endif>
  	<a href="{!! route('backend_statistik_transaksi.statistik_tahunan') !!}">
  		<i class="fa fa-bar-chart"></i> Tahunan
  	</a>
  </li>


</ul>
