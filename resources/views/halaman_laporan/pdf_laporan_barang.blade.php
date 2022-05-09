<!DOCTYPE html>
<html>
<head>
	<title>Laporan Barang</title>
	<style type="text/css">
		html{
			margin: 0;
			padding: 0;
			font-family: "Nunito", sans-serif;
		}
		.header{
			width: 100%;
			height: auto;
			background-color: #f7f7f7f7;
			padding-bottom: 50px;
		}
		.logo-laundry{
		    object-fit: cover;
		    width: 4rem;
		    height: 4rem;
		}
		.text-right{
			text-align: right;
		}
		.text-center{
			text-align: right;
		}
		.table-header tr td{
			padding: 5px;
			color: #999999;
			font-size: 12px;
		}
		.table-content tr th{
			padding: 8px;
			font-size: 11px;
			color: #999999;
			border-bottom: 1px solid #ddd;
		}
		.table-content tr td{
			padding: 8px;
			font-size: 11px;
			color: #454545;
			border-bottom: 1px solid #ddd;
		}
		.body-content{
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="header">
		<table style="width: 100%;" class="table-header">
			<tr>
				<td style="padding-top: 50px; padding-left: 50px;"><img src="{{ asset('icons/logoclean.png') }}" class="logo-laundry"></td>
				<td class="text-right" style="padding-top: 50px; padding-right: 50px;">Clean Yours<br>Jasa Laundry Terbaik di Indonesia</td>
			</tr>
			<tr>
				<td colspan="2" style="font-size: 28px; color: #313131; padding-top: 15px; padding-right: 50px;" class="text-right">Data Barang</td>
			</tr>
			<tr>
				<td colspan="2" class="text-right" style="padding-right: 50px;">
					@if($tanggal != '')
					{{ $tanggal }}
					@else
					{{ date('d M Y', strtotime($start_date2)) . ' - ' . date('d M Y', strtotime($end_date2)) }}
					@endif
				</td>
			</tr>
		</table>
	</div>
	<div class="body-content">
		<table style="width: 100%; border-collapse: collapse; padding-right: 50px; padding-left: 50px;" class="table-content">
			<tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Jumlah Awal</th>
                <th>Jumlah Sekarang</th>
                <th>Harga Barang</th>
				<th>Total</th>
				<th>Sisa</th>
                <th>Tanggal Updated</th>
			</tr>
			@foreach($barangs as $barang)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td class="text-center">{{ $barang->nama_barang }}</td>
                <td class="text-center">{{ $barang->kd_barang }}</td>
                <td class="text-center">{{ $barang->jumlah_awal }}</td>
                <td class="text-center">{{ $barang->jumlah_akhir }}</td>
                <td class="text-center">Rp. {{ number_format($barang->harga,2,',','.') }}</td>
				<td class="text-center">Rp. {{ number_format($barang->total,2,',','.') }}</td>
				<td class="text-center">Rp. {{ number_format($barang->sisa,2,',','.') }}</td>
                <td class="text-center">{{ date('d M Y', strtotime($barang->updated_at)) }}</td>
			</tr>
			@endforeach
			<tr>
				<th colspan="6" style="border-bottom: 0px; padding-top: 10px; padding-bottom: 10px;"></th>
				<th style="padding-top: 10px; padding-bottom: 10px; color: #454545; text-align: left;">TOTAL BIAYA BELANJA</th>
				<th style="padding-top: 10px; padding-bottom: 10px;">:</th>
				<th style="padding-top: 10px; padding-bottom: 10px; text-align: left; color: #7572f7;">Rp. {{ number_format($tot,2,',','.') }}</th>
			</tr>
			<tr>
				<th colspan="6" style="border-bottom: 0px; padding-top: 10px; padding-bottom: 10px;"></th>
				<th style="padding-top: 10px; padding-bottom: 10px; color: #454545; text-align: left;">TOTAL BIAYA SISA</th>
				<th style="padding-top: 10px; padding-bottom: 10px;">:</th>
				<th style="padding-top: 10px; padding-bottom: 10px; text-align: left; color: #7572f7;">Rp. {{ number_format($sis,2,',','.') }}</th>
				<th style="font-weight:bold; font-size:30px; text-align: bottom;">-</th>
			</tr>
			<tr>
				<th colspan="6" style="border-bottom: 0px; padding-top: 10px; padding-bottom: 10px;"></th>
				<th style="padding-top: 10px; padding-bottom: 10px; color: #454545; text-align: left;">TOTAL PENGELUARAN</th>
				<th style="padding-top: 10px; padding-bottom: 10px;">:</th>
				<th style="padding-top: 10px; padding-bottom: 10px; text-align: left; color: #7572f7;">Rp. {{ number_format($pengeluarans,2,',','.') }}</th>
			</tr>
		</table>
	</div>
</body>
</html>