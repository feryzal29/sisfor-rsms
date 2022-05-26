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
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Rekap Absensi kegiatan {{ $diklat->nama }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Masuk</th>
          <th>Selesai</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($absen as $item)
          <tr>
            <td>{{ $item->employee->nama }}</td>
            <td>{{ $item->employee->unit->nama_unit }}</td>
            <td>{{ $item->masuk_at }}</td>
            <td>{{ $item->selesai_at }}</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Masuk</th>
          <th>Selesai</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<form id="form-delete" method="POST">
  @csrf
  @method('delete')
</form>
@push('scripts')
    <script>
        $(document).ready(function () {

          $("#example1").DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
          $('.btn-delete').on('click', function () {
            let action = $(this).data('action');
            let xxx = confirm('Apakah anda ingin menghapus data ini ?');
            $('#form-delete').removeAttr('action');


            if (xxx) {
              $('#form-delete').attr('action',action);
              $('#form-delete').submit();
            }
          });
        });

        <script>
</script>
    </script>
@endpush

@endsection