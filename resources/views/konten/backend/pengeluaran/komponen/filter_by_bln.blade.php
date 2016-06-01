<div style="display:none;" id="filter_bulan" class="col-md-7 col-md-offset-3">
	{!! Form::open(['method' => 'get', 'route' => 'backend_pengeluaran.index']) !!}

	<div class="col-md-3">
		{!! Form::select('thn', [2016 => 2016, 2015 => 2015], Request::get('thn'), ['id' => 'thn', 'class' => 'form-control']) !!} 			
	</div>


	<div 
		@if(Request::get('getByBln'))
			class="col-md-5" 
		@else 
			class="col-md-8" 
		@endif
	>

			


		<div class="form-group ">
			{!! Form::select('getByBln', $list_bln, Request::get('getByBln'), ['id' => 'getByBln', 'class' => 'form-control']) !!} 
			{{-- {!! Form::text('getByBln', Request::get('getByBln'), ['placeholder' => 'search by nama produk...', 'class' => 'form-control']) !!}			 --}}
		</div>		
	</div>

	<div

		@if(Request::get('getByBln'))
			class="col-md-4" 
		@else 
			class="col-md-1" 
		@endif

	>
		<button class="btn btn-info pull-right" type="submit" >
			<i class='fa fa-search'></i>
		</button>	

		@if(Request::get('getByBln'))
			<a href="{!! route('backend_pengeluaran.index') !!}" class="btn btn-danger"> 
			<i class='fa fa-times'></i>
			</a>
		@endif
	</div>

	{!! Form::close() !!}

	
</div>