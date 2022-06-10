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
              <h3 class="card-title">Insert Data Diklat EXHT</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama Pelatihan</label>
                        <input type="text" name="nama" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                      <label>Tempat</label>
                      <input type="text" name="nama" class="form-control" value="" required>
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
                      <label>Tanggal kegiatan Mulai</label>
                        <div class="input-group date" id="tgl_kegitan" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="tanggal" data-target="#tgl_kegitan"/>
                            <div class="input-group-append" data-target="#tgl_kegitan" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal kegiatan Selesai</label>
                        <div class="input-group date" id="tgl_kegitan2" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="tanggal2" data-target="#tgl_kegitan2"/>
                            <div class="input-group-append" data-target="#tgl_kegitan2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" value="" required>
                        @error('error')
                            {{ $message }}
                        @enderror
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
          $('#tgl_kegitan2').datetimepicker({
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