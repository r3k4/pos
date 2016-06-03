@if(Cart::count() != 0 )

	<table class="table table-bordered table-hover">
		<thead>
			<tr class="alert-info">
				<th>Nama</th>
				<th>Jml</th>
				<th>harga</th>
				<th>subtotal</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach(Cart::content() as $list)
			<tr>
				<td>{!! $list->name !!}</td>
				<td>{!! $list->qty !!}</td>
				<td>
					{!! fungsi()->rupiah($list->price) !!}
				</td>
				<td>
					{!! fungsi()->rupiah($list->subtotal) !!}				
				</td>
				<td class="text-center">
					@include($base_view.'karyawan.action')
				</td>
			</tr>








		@endforeach
		</tbody>
	</table>


<div class="col-md-12">
	<h3 style="text-decoration:underline" class="text-right">
		Total : {!! fungsi()->rupiah(Cart::total()) !!}
	</h3>
</div>


@else
	<div class="alert alert-info">
		<h3>Pesanan masih kosong</h3>
	</div>
@endif