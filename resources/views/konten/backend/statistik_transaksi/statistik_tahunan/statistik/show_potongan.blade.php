
<h2 class="text-left text-warning">
	<i class='fa fa-caret-right'></i> Potongan/Diskon Bulan {!! fungsi()->bulan2(Request::get('bln')) !!}
</h2>


	<table class="table" style="font-size:15px">

		<tr class="text-success">
			<td>
				Jumlah potongan yg diberikan
			</td>
			<td width="10px">:</td>
			<td>
				{!! fungsi()->rupiah($nominal_potongan) !!}
			</td>
		</tr>


	</table>	

 

 