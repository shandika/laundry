<?php $number = 1; ?>
@foreach($barangs as $barang)
<tr>
	<th>{{ $number }}</th>
	<td class="text-center">{{ $barang->nama_barang }}</td>
    <td class="text-center">{{ $barang->kd_barang }}</td>
    <td class="text-center">{{ $barang->jumlah_awal }}</td>
    <td class="text-center">{{ $barang->jumlah_akhir }}</td>
    <td class="text-center">Rp. {{ number_format($barang->harga,2,',','.') }}</td>
    <td class="text-center">Rp. {{ number_format($barang->total,2,',','.') }}</td>
    <td class="text-center">Rp. {{ number_format($barang->sisa,2,',','.') }}</td>
    <td class="text-center">{{ date('d M Y', strtotime($barang->updated_at)) }}</td>
</tr>
<?php $number++; ?>
@endforeach