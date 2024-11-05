@extends('vendor.layout.sidebar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 ">
                        <?php if (session()->has('msg')) :?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="autoDismissAlert">
                            {{ session('msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif ?>
                        <div class="card card-primary card-outline card-tabs">
                            <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tab-kategori" data-toggle="pill"
                                            href="#tab-kategori" role="tab" aria-controls="tab-kategori"
                                            aria-selected="true">Data Produk</a>
                                    </li>
                                </ul>
                                <a href="{{ route('product.create')}}" class="btn btn-primary m-3">Tambah Data</a>
                            </div>

                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="tab-kategori" role="tabpanel"
                                        aria-labelledby="custom-tab-kategori">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kategori</th>
                                                    <th>Vendor</th>
                                                    <th>Nama</th>
                                                    <th>Deskripsi</th>
                                                    <th>Harga</th>
                                                    <th>Gambar</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Baju</td>
                                                        <td>Uniqlo</td>
                                                        <td>Kaos L</td>
                                                        <td>kaso bagus</td>
                                                        <td>89000</td>
                                                        <td>gambar</td>
                                                        <td>
                                                            <a href="{{ route('produk.show',1)}}">
                                                                <button type="button" class="btn btn-info btn-sm">
                                                                    <i class="fas fa-eye"></i>
                                                                    Show
                                                                </button>
                                                            </a>
                                                            <a class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Produk?')"
                                                            href="{{ route('produk.destroy', 1) }}">
                                                                <i class="fas fa-trash">
                                                                </i>
                                                                Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
<script src="{{ asset('assets/admin') }}/assets/js/custom/kategori.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
@endsection
