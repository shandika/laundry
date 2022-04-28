@extends('halaman_template')
@section('css')
<link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
<style type="text/css">
.fotouser{
    object-fit: cover;
    width: 3rem;
    height: 3rem;
}
.c-primary{
    color: #7571f9;
}
.foto_pengguna{
    object-fit: cover;
    width: 8rem;
    height: 8rem;
}
.tabel-riwayat thead tr th, .tabel-riwayat tbody tr th, .tabel-riwayat tbody tr td{
    font-size: 11px;
}
</style>
@endsection
@section('konten')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Kelola Data</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/kelola_pengguna') }}">Kelola Pengguna</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Pesanan Baru</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Cucian</th>
                                    <th>Pembayaran</th>
                                    <td>Nama Pelanggan</td>
                                    <td>Alamat Pelanggan</td>
                                    <td>No HP</td>
                                    <td>Tanggal Memesan</td>
                                    <td>Tanggal Diproses</td>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1 ?>
                                @foreach($pesanans as $pesanan)
                                <tr>
                                    <th class="align-middle text-center">{{ $number }}</th>
                                    <td>{{ $pesanan->jenis_cucian }}</td>
                                    <td>{{ $pesanan->pembayaran }}</td>
                                    <td>{{ $pesanan->nama_pelanggan }}</td>
                                    <td>{{ $pesanan->alamat_pelanggan }}</td>
                                    <td>{{ $pesanan->no_hp_pelanggan }}</td>
                                    <td>{{ date('d M Y', strtotime($pesanan->created_at)) }}</td>
                                    <td>{{ date('d M Y', strtotime($pesanan->updated_at)) }}</td>
                                    <td>
                                        @if($pesanan->status == 0)
                                        <button class="btn btn-warning" disabled>Belum Diproses</button>
                                        @elseif($pesanan->status == 1)
                                        <p>Sedang Diproses</p>
                                        @elseif($pesanan->status == 2)
                                        <p>Pesanan Dibatalkan</p>
                                        @elseif($pesanan->status == 3)
                                        <p>Pesanan Selesai</p>
                                        @endif
                                    </td>
                                    <td>
                                    @if($pesanan->status == 0)
                                    <form action="{{ url('/edit_pesanan/'.$pesanan->id) }}" method="post">
                                        @csrf
                                    <button type="submit" class="btn btn-sm btn-primary font-weight-bold">Proses</button>
                                    </form>
                                    @elseif($pesanan->status == 1)
                                    <button class="btn font-weight-bold btn-sm mb-1 btn-danger" data-toggle="modal" data-target="#modalBatal{{ $pesanan->id }}">Batalkan </button>
                                    <form action="{{ url('/selesai_pesanan/'.$pesanan->id) }}" method="post">
                                        @csrf
                                    <button type="submit" class="btn btn-sm btn-success font-weight-bold">Selesai</button>
                                    </form>
                                    @elseif($pesanan->status == 2)
                                    <form action="{{ url('/edit_pesanan/'.$pesanan->id) }}" method="post">
                                        @csrf
                                    <button type="submit" class="btn btn-sm btn-primary font-weight-bold">Proses</button>
                                    </form>
                                    @elseif($pesanan->status == 3)
                                    <p class="text-center">-</p>
                                    @endif
                                    </td>
                                </tr>
                                <?php $number++ ?>
                                <!-- Modal Batalkan Pesanan -->
                                <div class="modal fade" id="modalBatal{{ $pesanan->id }}" tabindex="-1" role="dialog" aria-labelledby="modalBatal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Alasn Batal Pesanan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/batalkan_pesanan/'.$pesanan->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input name="alasan[]" class="form-check-input" type="checkbox" value="Laundry sedang libur" id="flexCheck1">
                                                    <label class="form-check-label" for="flexCheck1">
                                                        Laundry sedang libur
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input name="alasan[]" class="form-check-input" type="checkbox" value="Laundry penuh" id="flexCheck2">
                                                    <label class="form-check-label" for="flexCheck2">
                                                        Laundry penuh
                                                    </label>
                                                </div>
                                                <div class="form-check mb-1">
                                                    <input name="alasan[]" class="form-check-input" type="checkbox" value="Cuaca hujan" id="flexCheck3">
                                                    <label class="form-check-label" for="flexCheck1">
                                                        Cuaca hujan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div style="margin-bottom: -10px;"><p class="font-weight-bold text-dark">Lainnya : </p></div>
                                                    <input type="text" class="form-control" name="alasan[]" placeholder="Alsan Lainnya">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                                </div>
                                <!-- End Modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('script')
<script src="{{ asset('plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
<script type="text/javascript">
$(document).on('click', '.lihat_pengguna_btn', function(e){
    e.preventDefault();
    var id = $(this).attr('data-lihat');
    $.ajax({
        url: "{{ url('/lihat_pengguna') }}/" + id,
        method: "GET",
        success:function(response){
            $('.foto_pengguna').attr('src', "{{ asset('/pictures') }}/" + response.penggunas.avatar);
            $('.nama_pengguna').html(response.penggunas.name);
            $('.role_pengguna').html(response.penggunas.role);
            var isi_riwayat = "";
            for(var i = 0; i < response.transaksis.length; i++){
                var no = i + 1;
                isi_riwayat += '<tr><th>'+no+'</th><th>'+response.transaksis[i].nama_outlet+'</th><td>'+response.transaksis[i].kd_invoice+'</td><td>'+response.transaksis[i].nama_pelanggan+'</td><td>'+moment(response.transaksis[i].tgl_pemberian).format('DD MMMM YYYY')+'</td></tr>';
            }
            $('.isi_riwayat').html(isi_riwayat);
            $('.semua_riwayat_btn').attr('href', "{{ url('/laporan_pegawai_riwayat') }}/" + response.penggunas.id);
        }
    });
});

$(document).on('click', '.tambah_pengguna_btn', function(e){
    e.preventDefault();
    var cek_count = $(this).attr('data-count');
    if(parseInt(cek_count) != 0)
    {
        window.open("{{ url('/tambah_pengguna') }}","_self");
    }else{
        outlet_kosong();
    }
});

function outlet_kosong(){
    toastr.warning("Silakan buat outlet terlebih dahulu","Peringatan !", {
        timeOut:5e3,
        closeButton:!0,
        debug:!1,
        newestOnTop:!0,
        progressBar:!0,
        positionClass:"toast-bottom-right",
        preventDuplicates:!0,
        onclick:null,
        showDuration:"300",
        hideDuration:"1000",
        extendedTimeOut:"1000",
        showEasing:"swing",
        hideEasing:"linear",
        showMethod:"fadeIn",
        hideMethod:"fadeOut",
        tapToDismiss:!1
    });
}

@if ($message = Session::get('tersimpan'))
swal(
    "Berhasil!",
    "{{ $message }}",
    "success"
);
@endif

@if ($message = Session::get('terhapus'))
swal(
    "Berhasil!",
    "{{ $message }}",
    "success"
);
@endif

@if ($message = Session::get('terubah'))
swal(
    "Berhasil!",
    "{{ $message }}",
    "success"
);
@endif
</script>
@endsection