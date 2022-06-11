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
      <h3 class="card-title">Absensi Manual kegiatan {{ $diklat->nama }}</h3>
      <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg">TAMBAH DATA</button>
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
          <th>Total Jam</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($absen as $item)
          <tr>
            <td>{{ $item->employee->nama }}</td>
            <td>{{ $item->employee->unit->nama_unit }}</td>
            <td>{{ $item->masuk_at }}</td>
            <td>{{ $item->selesai_at }}</td>
            <td>{{ $item->total_waktu }} Jam</td>
            <td>
              <div class="form-group">
                <a onclick="return confirm('Are you sure?')" href="{{ route('absen.destroy',$item->id) }}" class="btn btn-danger">delete</a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Masuk</th>
          <th>Selesai</th>
          <th>Total Jam</th>
          <th>Action</th>
        </tr>
        </tfoot>
      </table>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH DATA KEGIATAN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('absen.manual') }}" method="POST">
            @csrf
          <div class="modal-body">
            <input type="hidden" name="diklat" value="{{ $diklat->id }}">
            <div class="form-group">
              <label>Nama Pegawai</label>
              <div class="select2-blue">
                <select class="select2" name="id[]" multiple="multiple" data-placeholder="Nama Pegawai" style="width: 100%;">
                  @foreach ($employees as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label>Masuk</label>
                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                    <input type="text" name="masuk" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label>Selesai</label>
                <div class="input-group date" id="reservationdatetime2" data-target-input="nearest">
                    <input type="text" name="selesai" class="form-control datetimepicker-input" data-target="#reservationdatetime2"/>
                    <div class="input-group-append" data-target="#reservationdatetime2" data-toggle="datetimepicker">
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
@push('scripts-select2')
    <script>
        $(document).ready(function () {
          $('#reservationdate').datetimepicker({
            format: 'L'
          });
          $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

          $('#reservationdate2').datetimepicker({
            format: 'L'
          });
          $('#reservationdatetime2').datetimepicker({ icons: { time: 'far fa-clock' } });

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

</script>
@endpush

@endsection