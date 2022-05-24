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
              <h3 class="card-title">Edit data diklat RS PKU Muhammadiyah Sekapuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                <form action="{{ route('diklat.update',$diklat->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <label>Penyelenggara</label>
                      <select class="form-control select2 select2bs4" style="width: 100%;" name="units_id">
                        @foreach ($unit as $item)
                        <option value="{{ $item->id }}"{{ $item->id == $diklat->unit->id ? 'selected' : '' }}>{{ $item->nama_unit }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Kegiatan</label>
                      <input type="text" name="nama" class="form-control" value="{{ $diklat->nama }}">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kegiatan</label>
                      <select class="form-control select2 select2bs4" style="width: 100%;" name="jenis_kegiatans_id">
                        @foreach ($jenis as $item)
                        <option value="{{ $item->id }}"{{ $item->id == $diklat->jenis_kegiatans_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tempat</label>
                      <input type="text" name="tempat" class="form-control" value="{{ $diklat->tempat }}">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="text" class="form-control datepicker" name="tanggal" value="{{ date('d/m/Y',strtotime($diklat->tanggal)) }}"/>
                    </div>
                    <input type="submit" class="btn btn-success float-right" value="GANTI">
                </form>
            </div>
            <!-- /.card-body -->
          </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

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

          let date = $('.datepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD/MM/YYYY'
            }
          });

          console.log(date);

          $('.select2').select2()

          //Initialize Select2 Elements
          $('.select2bs4').select2({
            theme: 'bootstrap4'
          });
          });
    </script>
@endpush

@endsection