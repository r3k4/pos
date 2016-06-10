<div style="display:none;" id="filter_tgl" class="col-md-7 col-md-offset-3">
	{!! Form::open(['method' => 'get', 'route' => 'backend_pengeluaran.index']) !!}
 

	<div 
		@if(Request::get('getByTgl'))
			class="col-md-8" 
		@else 
			class="col-md-9" 
		@endif
	>

			


		<div class="form-group ">
		    <div class='input-group date' id='datetimepicker2'>
		        <input name="getByTgl" value="{!! Request::get('getByTgl') !!}" readonly="0" type='text' class="form-control" />
		        <span class="input-group-addon">
		            <span class="fa fa-calendar"></span>
		        </span>
		    </div>
		</div>		
	</div>

	<div

		@if(Request::get('getByTgl'))
			class="col-md-3" 
		@else 
			class="col-md-1" 
		@endif

	>
		<button class="btn btn-info pull-right" type="submit" >
			<i class='fa fa-search'></i>
		</button>	

		@if(Request::get('getByTgl'))
			<a href="{!! route('backend_pengeluaran.index') !!}" class="btn btn-danger"> 
			<i class='fa fa-times'></i>
			</a>
		@endif
	</div>

	{!! Form::close() !!}

	
</div>


<script type="text/javascript">

	$(function () {
	    $('#datetimepicker2').datetimepicker({
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