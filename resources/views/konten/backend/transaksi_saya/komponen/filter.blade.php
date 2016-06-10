<div class="row">
	<div class="col-md-7 col-lg-offset-5">
		{!! Form::open(['method' => 'get', 'route' => 'backend_transaksi_saya.index']) !!}

		<div 
			@if(Request::get('filterTgl'))
				class="col-md-8" 
			@else 
				class="col-md-10" 
			@endif
		>
			<div class="form-group ">
				{!! Form::text('filterTgl', Request::get('filterTgl'), ['placeholder' => 'filter berdasarkan tgl...', 'class' => 'form-control', 'readonly' => 0, 'id' => 'filterTgl']) !!}			
			</div>		
		</div>

		<div

			@if(Request::get('filterTgl'))
				class="col-md-4" 
			@else 
				class="col-md-2" 
			@endif

		>
			<button class="btn btn-info pull-right" type="submit" >
				<i class='fa fa-search'></i> filter
			</button>	

			@if(Request::get('filterTgl'))
				<a href="{!! route('backend_transaksi_saya.index') !!}" class="btn btn-danger">reset</a>
			@endif
		</div>

		{!! Form::close() !!}

		
	</div>
</div>

<script type="text/javascript">
	$(function () {
	    $('#filterTgl').datetimepicker({
	    	locale: 'id',
	    	ignoreReadonly : true,
	    	// viewMode: 'years',
	    	format: 'YYYY-MM-DD',
	        icons: {
	            time: "fa fa-clock-o",
	            next: "fa fa-arrow-right",
	            previous: "fa fa-arrow-left",
	            date: "fa fa-calendar",
	            up: "fa fa-arrow-up",
	            down: "fa fa-arrow-down"
	        }		        	
	    });
	});	

</script>