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
              <h3 class="card-title">Update Data STR</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                <form action="{{ route('employee.str.update', $str->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>No. STR</label>
                        <input type="text" name="no_str" class="form-control" value="{{ $str->no_str }}">
                      </div>
                      <div class="form-group">
                        <label>Tanggal Terbit</label>
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" name="tgl_terbit" data-target="#reservationdate" value=""/>
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Tanggal ED</label>
                          <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" name="tgl_ed" data-target="#reservationdate2" value=""/>
                              <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
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
@push('scripts-select')

<script>
  $(document).ready(function () {
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    $('#reservationdate2').datetimepicker({
        format: 'L'
    });
    $('#reservationdate3').datetimepicker({
        format: 'L'
    });
    $('#reservationdate4').datetimepicker({
        format: 'L'
    });
  });
</script>
@endpush
@endsection