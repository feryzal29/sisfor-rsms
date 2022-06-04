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
              <h3 class="card-title">STR <b>{{ $employee->nama }}</b></h3>
              <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ $message }}</strong>
                </div>  
                @elseif($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ $message }}</strong>
                </div>  
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No. STR</th>
                  <th>Tanggal Terbit</th>
                  <th>Tanggal ED</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($str as $item)
                  <tr>
                    <td>{{ $item->no_str }}</td>
                    <td>{{ $item->tgl_terbit }}</td>
                    <td>{{ $item->tgl_ed }}</td>
                    <td>
                      <a href="{{ route('employee.str.show',$item->id) }}" class="btn btn-success">Edit</a>
                      <a onclick="return confirm('Are you sure?')" href="{{ route('str.delete', $item->id) }}" class="btn btn-danger">Delete</a>
                      {{-- <a onclick="return confirm('Are you sure?')" href="{{ route('jenjang.delete', $item->id) }}" class="btn btn-danger">Delete</a> --}}
                    </td>
                  </tr>    
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>No. STR</th>
                    <th>Tanggal Terbit</th>
                    <th>Tanggal ED</th>
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
        <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH DATA STR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('employees.str.upload') }}" method="POST">
        @csrf
      <div class="modal-body">
        <input type="hidden" name="employee_id" value="{{ $employee->id }}">
            <div class="form-group">
              <label>No. STR</label>
              <input type="text" name="no_str" class="form-control" placeholder="No. STR">
            </div>
            <div class="form-group">
              <label>Tanggal Terbit</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="tgl_terbit" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
              <label>Tanggal ED</label>
                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="tgl_ed" data-target="#reservationdate2"/>
                    <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="UPLOAD">
      </div>
    </form>
    </div>
  </div>
</div>
<form id="form-delete" method="POST">
  @csrf
  @method('delete')
</form>
@push('scripts')
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
          bsCustomFileInput.init();
          $('#reservationdate').datetimepicker({
             format: 'L'
          });
          $('#reservationdate2').datetimepicker({
              format: 'L'
          });
        });
    </script>
@endpush

@endsection