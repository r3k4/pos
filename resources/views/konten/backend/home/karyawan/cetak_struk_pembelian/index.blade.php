<<!DOCTYPE html>
<html>
<head>
	<title>Struk Pembelian</title>
<style type="text/css">
	@page { margin: 5px; }
	body { 
			margin: 5px; 
			font-size: 10px;
		}
	.header_kolom td{
		font-weight: bold;
		border-bottom: 0.01em dotted #222;
	}
	.tabel_utama {
		border-top : 0.1em dotted #222; 
		border-bottom : 0.1em dotted #222; 
		width:100%; 
	}
	.tabel_total{
		margin-top: 10px;
		border-bottom : 0.1em dotted #222; 
		width:100%; 	
		padding-left: 30px;	
	}
</style>
</head>
<body>
	 <h4 style="margin:2px;">
	 	{!! $transaksi->fk__mst_cabang !!}
	 </h4>
	 <b>
	 	{!! $cabang->alamat !!}
	 </b>
	 <br>
	 <b>
	 	Telp. {!! $cabang->no_tlp !!}
	 </b>
	 <hr style="margin:3px; border : 0.1em dotted #222">

	No : {!! $transaksi->no_transaksi !!}


<table class="tabel_utama">
	<tr class="header_kolom">
		<td style="text-align:center" width="30px">
			No.
		</td>
		<td>
			Nama
		</td>
		<td style="text-align:center" width="40px">
			Qty
		</td>
		<td style="text-align:center" width="70px">
			Harga
		</td>
		<td style="text-align:center" width="70px">
			Total
		</td>
	</tr>
	@php($no=1)
	@foreach($transaksi->mst_penjualan as $list)
		<tr>
			<td style="text-align:center">{!! $no++ !!}</td>
			<td>
				{!! $list->fk__mst_produk !!}
			</td>
			<td style="text-align:center">
				{!! $list->qty !!}
			</td>
			<td style="text-align:center">
				{!! number_format($list->harga_produk) !!}
			</td>
			<td style="text-align:center">
				{!! number_format($list->subtotal_uang_diterima) !!}
			</td>
		</tr>
	@endforeach
</table>


<table class="tabel_total">
	<tr>
		<td width="150px">
			Total---{!! $transaksi->fk__total_item !!} item(s).
		</td>
		<td>
			@if($transaksi->diskon > 0)
			{!! number_format($transaksi->total_tanpa_potongan) !!}
			@else
			{!! number_format($transaksi->subtotal_pembayaran) !!}
			@endif
		</td>
	</tr>
	<tr>
		<td>
			Tunai
		</td>
		<td>
			{!! number_format($transaksi->bayar) !!}
		</td>
	</tr>

	@if($transaksi->diskon > 0)
	<tr>
		<td>
			Potongan
		</td>
		<td>
			{!! number_format($transaksi->diskon) !!}
		</td>
	</tr>

	@else
	<tr>
		<td>
			Kembali
		</td>
		<td>
			{!! number_format($transaksi->nominal_kembalian) !!}
		</td>
	</tr>
	@endif

</table>

Operator : {!! $transaksi->fk__mst_user !!}
<br>
{!! fungsi()->date_to_tgl(date('Y-m-d')).' | '.date('H:i').' WIB' !!}
<br>
Periksa barang sebelum dibeli.
<br>
barang yg sudah dibeli tdk dapat dikembalikan atau ditukar.

<script type="text/javascript">
	this.print();
	this.close();
</script>

</body>
</html>



