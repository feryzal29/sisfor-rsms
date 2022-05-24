@extends('template.template')
@section('conten')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li> --}}
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Kegiatan Diklat RS PKU Muhammadiyah Sekapuk</h3>
              <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg">TAMBAH DATA</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ $message }}</strong>
                </div>  
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Penyelenggara</th>
                  <th>Kegiatan</th>
                  <th>Jenis Kegiatan</th>
                  <th>Tempat</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->unit->nama_unit }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kegiatan->nama }}</td>
                    <td>{{ $item->tempat }}</td>
                    <td>{{ date('d-M-Y',strtotime($item->tanggal))}}</td>
                    <td>
                      <a href="{{ route('diklat.show',$item->id) }}" class="btn btn-success float-left" style="margin-right: 5px">Edit</a>
                      <a href="javascript:;" class="btn btn-danger btn-delete float-left" style="margin-right: 5px" data-action="{{ route('diklat.delete',$item->id) }}">Delete</a>
                     
                      <div class="dropdown show float-left">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown">
                          Absensi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Masuk</a>
                          <a class="dropdown-item" href="#">Pulang</a>
                          <a class="dropdown-item" href="#">Rekap Absensi </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Penyelenggara</th>
                  <th>Kegiatan</th>
                  <th>Jenis Kegiatan</th>
                  <th>Tempat</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH DATA INDEX EMERGENCY</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('diklat.store') }}" method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
              <label>Penyelenggara</label>
              <select class="form-control select2 select2bs4" style="width: 100%;" name="units_id">
                @foreach ($unit as $item)
                  <option value="{{ $item->id }}">{{ $item->nama_unit }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Kegiatan</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama Kegiatan">
            </div>
            <div class="form-group">
              <label>Jenis Kegiatan</label>
              <select class="form-control select2 select2bs4" style="width: 100%;" name="jenis_kegiatans_id">
                @foreach ($jenis as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Tempat</label>
              <input type="text" name="tempat" class="form-control" placeholder="Tempat Kegiatan">
            </div>
            <div class="form-group">
              <label>Tanggal kegiatan</label>
                <div class="input-group date" id="tgl_kegitan" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#tgl_kegitan"/>
                    <div class="input-group-append" data-target="#tgl_kegitan" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="SIMPAN">
      </div>
    </form>
    </div>
  </div>
</div>
<form id="form-delete" method="POST">
  @csrf
  @method('delete')
</form>
@push('scripts-select2')
    <script>
        $(document).ready(function () {
          $('.btn-delete').on('click', function () {
            let action = $(this).data('action');
            let xxx = confirm('Apakah anda ingin menghapus data ini ?');
            $('#form-delete').removeAttr('action');


            if (xxx) {
              $('#form-delete').attr('action',action);
              $('#form-delete').submit();
            }
          });

          $('#tgl_kegitan').datetimepicker({
              format: 'L'
          });
          $('.select2').select2()

          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4'
          });
          });
    </script>
@endpush

@endsection