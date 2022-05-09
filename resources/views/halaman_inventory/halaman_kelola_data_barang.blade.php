@extends('halaman_template')
@section('css')
<link href="{{ asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/sweetalert/css/sweetalert.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">

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
            <li class="breadcrumb-item"><a href="#">Inventory</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/kelola_barang') }}">Kelola Data Barang</a></li>
        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="modal fade" id="lihatModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Barang</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table border="0" class="table">
                                        <tr>
                                            <th>Nama Barang</th>
                                            <td>:</td>
                                            <td class="nama_barang"></td>
                                        </tr>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <td>:</td>
                                            <td class="kode_barang"></td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Awal</th>
                                            <td>:</td>
                                            <td class="jumlah_awal"></td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah Sekarang</th>
                                            <td>:</td>
                                            <td class="jumlah_akhir"></td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td>:</td>
                                            <td class="harga_barang"></td>
                                        </tr>
                                        <tr>
                                            <th>Tgl Update</th>
                                            <td>:</td>
                                            <td class="tgl_update"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12 mb-2">
                                    <h4 class="text-left text-primary ml-2">Riwayat Perubahan Stok</h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration tabel-riwayat">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kd Barang</th>
                                                    <th>Jumlah Awal</th>
                                                    <th>Jumlah Sekarang</th>
                                                    <th>Total</th>
                                                    <th>Sisa</th>
                                                    <th>Tgl Perubahan</th>
                                                </tr>
                                            </thead>
                                            <tbody class="isi_riwayat">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                    	<h4 class="card-title">Daftar Barang</h4>
                    	<button type="button" class="btn font-weight-bold btn-sm mb-1 btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Barang <span class="btn-icon-right"><i class="fa fa-plus"></i></span></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Jumlah Awal</th>
                                    <th>Jumlah Sekarang</th>
                                    <th>Harga Barang</th>
                                    <th>Total Harga</th>
                                    <th>Sisa</th>
                                    <th>Tanggal Updated</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $number = 1 ?>
                            	@foreach($barangs as $barang)
                                <tr>
                                    <th class="align-middle text-center">{{ $number }}</th>
                                    <td class="text-center">{{ $barang->nama_barang }}</td>
                                    <td class="text-center">{{ $barang->kd_barang }}</td>
                                    <td class="text-center">{{ $barang->jumlah_awal }}</td>
                                    <td class="text-center">{{ $barang->jumlah_akhir }}</td>
                                    <td class="text-center">Rp. {{ number_format($barang->harga,2,',','.') }}</td>
                                    <td class="text-center">Rp. {{ number_format($barang->total,2,',','.') }}</td>
                                    <td class="text-center">Rp. {{ number_format($barang->sisa,2,',','.') }}</td>
                                    <td class="text-center">{{ date('d F Y', strtotime($barang->updated_at)) }}</td>
                                    <td style="text-align: center;">
                                    	<div class="dropdown custom-dropdown">
                                            <div data-toggle="dropdown" style="padding: 5px;"><i class="fa fa-ellipsis-v c-primary" style="font-size: 16px;"></i>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right"><a role="button" data-toggle="modal" data-target="#lihatModal" data-lihat="{{ $barang->kd_barang }}" class="dropdown-item lihat_barang_btn" href="#">Lihat</a> <a role="button" data-toggle="modal" data-target="#editModal{{ $barang->kd_barang }}" class="dropdown-item edit_barang_btn" href="#">Edit</a>
                                            </div>
                                        </div>&nbsp;&nbsp;&nbsp;
                                        <a href="#" class="tombol-hapus" data-id="{{ $barang->kd_barang }}" data-nama="{{ $barang->nama_barang }}" style="color: grey;"><i class="fa fa-trash c-primary" style="font-size: 16px;">
                                        </i></a>
                                    </td>
                                </tr>
                                <?php $number++ ?>
                                <!-- Modal Edit Barang -->
                                <div class="modal fade" id="editModal{{ $barang->kd_barang }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('/edit_barang/'.$barang->kd_barang) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <div style="margin-bottom: -10px;"><p class="font-weight-bold text-dark">Nama Barang : </p></div>
                                                    <input type="text" class="form-control nama" name="nama_barang" id="nama" value="{{ $barang->nama_barang }}">
                                                </div>
                                                <div class="nama_barang_error" style="margin-top: -20px;"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <div style="margin-bottom: -10px;"><p class="font-weight-bold text-dark">Jumlah Barang : </p></div>
                                                    <input type="number" class="form-control jumlah" name="jumlah_barang" id="jumlah" value="{{ $barang->jumlah_akhir }}">
                                                </div>
                                                <div class="jumlah_barang_error" style="margin-top: -20px;"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <div style="margin-bottom: -10px;"><p class="font-weight-bold text-dark">Harga Barang : </p></div>
                                                    <input type="number" class="form-control harga" name="harga_barang" id="harga" value="{{ $barang->harga }}">
                                                </div>
                                                <div class="harga_barang_error" style="margin-top: -20px;"></div>
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
<!-- Modal Tambah Barang -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukan Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form action="{{ url('/simpan_barang') }}" class="barang-form" method="POST" enctype="multipart/form-data">
			@csrf
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
                <div style="margin-bottom: -10px;"><p class="font-weight-bold text-dark">Nama Barang : </p></div>
					<input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
				</div>
				<div class="nama_barang_error" style="margin-top: -20px;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
                <div style="margin-bottom: -10px;"><p class="font-weight-bold text-dark">Jumlah Barang : </p></div>
					<input type="number" class="form-control" name="jumlah_barang" id="jumlah_barang" required>
				</div>
				<div class="jumlah_barang_error" style="margin-top: -20px;"></div>
			</div>
		</div>
        <div class="row">
			<div class="col-md-12">
				<div class="form-group">
                <div style="margin-bottom: -10px;"><p class="font-weight-bold text-dark">Harga Barang : </p></div>
					<input type="number" class="form-control" name="harga_barang" id="harga_barang" required>
				</div>
				<div class="harga_barang_error" style="margin-top: -20px;"></div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary simpan-akhir">Save changes</button>
      </div>
	  </form>
    </div>
  </div>
</div>
<!-- End Modal -->


@endsection
@section('script')
<!-- Datatable -->
<script src="{{ asset('plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/js/toastr.min.js') }}"></script>
<!-- End Datatable -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('js/jquery.form-validator.min.js') }}"></script>

<script type="text/javascript">
$(document).on('click', '.lihat_barang_btn', function(e){
    e.preventDefault();
    var id = $(this).attr('data-lihat');
    $.ajax({
        url: "{{ url('/lihat_barang') }}/" + id,
        method: "GET",
        success:function(response){
            var isi_nama ="";
            for (var i = 0; i < response.barangs.length; i++) {
                var no = i + 1;
                isi_nama += '<div>'+response.barangs[i].nama_barang+'</div>';
            }
            var isi_kode ="";
            for (var i = 0; i < response.barangs.length; i++) {
                var no = i + 1;
                isi_kode += '<div>'+response.barangs[i].kd_barang+'</div>';
            }
            var isi_awal ="";
            for (var i = 0; i < response.barangs.length; i++) {
                var no = i + 1;
                isi_awal += '<div>'+response.barangs[i].jumlah_awal+'</div>';
            }
            var isi_akhir ="";
            for (var i = 0; i < response.barangs.length; i++) {
                var no = i + 1;
                isi_akhir += '<div>'+response.barangs[i].jumlah_akhir+'</div>';
            }
            var harga ="";
            for (var i = 0; i < response.barangs.length; i++) {
                var no = i + 1;
                harga += '<div>'+response.barangs[i].harga+'</div>';
            }
            var isi_update ="";
            for (var i = 0; i < response.barangs.length; i++) {
                var no = i + 1;
                isi_update += '<div>'+moment(response.barangs[i].updated_at).format('DD MMMM YYYY')+'</div>';
            }
            $('.nama_barang').html(isi_nama);
            $('.kode_barang').html(isi_kode);
            $('.jumlah_awal').html(isi_awal);
            $('.jumlah_akhir').html(isi_akhir);
            $('.harga_barang').html(harga);
            $('.tgl_update').html(isi_update);
            var isi_riwayat = "";
            for(var i = 0; i < response.mutasis.length; i++){
                var no = i + 1;
                isi_riwayat += '<tr><th>'+no+'</th><th>'+response.mutasis[i].nama_barang+'</th><td>'+response.mutasis[i].id_barang+'</td><td>'+response.mutasis[i].jumlah_awal+'</td><td>'+response.mutasis[i].jumlah_akhir+'</td><td>'+response.mutasis[i].total+'</td><td>'+response.mutasis[i].sisa+'</td><td>'+moment(response.mutasis[i].updated_at).format('DD MMMM YYYY')+'</td></tr>';
            }
            $('.isi_riwayat').html(isi_riwayat);
        }
    });
});


$(document).ready(function(){
    $(".barang-form").validate({
        rules: {
          nama_barang: "required",
          jumlah_barang: "required",
          harga_barang: "required"
        },
        messages: {
          nama_barang: "<span style='color: red;'>Nama barang tidak boleh kosong</span>",
          jumlah_barang: "<span style='color: red;'>Jumlah barang tidak boleh kosong</span>",
          harga_barang: "<span style='color: red;'>Harga barang tidak boleh kosong</span>",
        },
        errorPlacement: function ($error, $element) {
            var name = $element.attr("name");

            $("." + name + "_error").append($error);
        }
    });
});

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
<script>

    $('.tabel-riwayat').DataTable({
        "searching": false,
        "scrollY" : "200px",
        "scrollX" : true
    });
</script>
<script>
    $('.tombol-hapus').click(function () {
        var idbarang = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
            title: "Yakin?",
            text: "Kamu akan menghapus barang "+nama+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapus_barang/"+idbarang+""
            } else {
                swal("Data tidak jadi dihapus");
            }
        });
    });
</script>
@endsection