<div class="row">
	<div class="col-md-6 col-md-offset-6">
		{!! Form::open(['method' => 'get', 'route' => 'backend_pengeluaran.statistik']) !!}

		<div  
			@if(Request::get('filterTahun'))
				class="col-md-5" 
			@else 
				class="col-md-7" 
			@endif
		>
			<div class="form-group ">
				{!! Form::text('filterTahun', Request::get('filterTahun'), ['placeholder' => 'tahun...', 'class' => 'form-control', 'id' => 'filterTahun']) !!}			
			</div>		
		</div>

		<div

			@if(Request::get('filterTahun'))
				class="col-md-5" 
			@else 
				class="col-md-2" 
			@endif

		>
			<button class="btn btn-info pull-right" type="submit" >
				<i class='fa fa-search'></i> filter
			</button>	

			@if(Request::get('filterTahun'))
				<a href="{!! route('backend_pengeluaran.statistik') !!}" class="btn btn-danger">reset</a>
			@endif
		</div>

		{!! Form::close() !!}

		
	</div>
</div>
