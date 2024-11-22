<div style="display:none;" id="filter_bulan" class="col-md-7 col-md-offset-3">
	<form method="get" action="{{ route('backend_pengeluaran.index') }}">

		<div class="col-md-3">
			<select name="thn" id="thn" class="form-control">
				<option value="2016" {{ Request::get('thn') == 2016 ? 'selected' : '' }}>2016</option>
				<option value="2015" {{ Request::get('thn') == 2015 ? 'selected' : '' }}>2015</option>
			</select>
		</div>

		<div 
			@if(Request::get('getByBln'))
				class="col-md-5" 
			@else 
				class="col-md-8" 
			@endif
		>
			<div class="form-group">
				<select name="getByBln" id="getByBln" class="form-control">
					@foreach($list_bln as $key => $value)
						<option value="{{ $key }}" {{ Request::get('getByBln') == $key ? 'selected' : '' }}>{{ $value }}</option>
					@endforeach
				</select>
			</div>		
		</div>

		<div
			@if(Request::get('getByBln'))
				class="col-md-4" 
			@else 
				class="col-md-1" 
			@endif
		>
			<button class="btn btn-info pull-right" type="submit">
				<i class='fa fa-search'></i>
			</button>	

			@if(Request::get('getByBln'))
				<a href="{{ route('backend_pengeluaran.index') }}" class="btn btn-danger"> 
					<i class='fa fa-times'></i>
				</a>
			@endif
		</div>

	</form>
</div>
