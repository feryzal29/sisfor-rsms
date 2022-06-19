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

          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Pengajuan cuti <b>{{ $employee->nama }}</b></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>	
                  <strong>{{ $message }}</strong>
                </div>  
              @endif
              <form action="{{ route('employee.cuti.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="hidden" name="employee_id" class="form-control" value="{{ $employee->id }}">
                </div>
                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" name="nip" class="form-control" value="{{ $employee->nip }}" readonly>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="{{ $employee->nama }}" readonly>
                </div>
                  <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ $employee->jbtn }}" readonly>
                </div>
                <div class="form-group">
                  <label>PJ. Terkait</label>
                  <select class="form-control select2 select2bs4" style="width: 100%;" name="pj_terkait">
                    @foreach ($emp as $item)
                      <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Pengganti</label>
                  <select class="form-control select2 select2bs4" style="width: 100%;" name="pengganti">
                    @foreach ($emp as $item)
                      <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Kabag. Umum</label>
                  <select class="form-control select2 select2bs4" style="width: 100%;" name="kabag_umum">
                    @foreach ($emp as $item)
                      <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                  </select>
                </div>
                  <div class="form-group">
                    <label>Tanggal Pengajuan</label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" name="tgl_pengajuan" data-target="#reservationdate" />
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <label>Awal Cuti</label>
                      <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" name="tgl_awal" data-target="#reservationdate2" />
                          <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <label>Akhir Cuti</label>
                      <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" name="tgl_akhir" data-target="#reservationdate3" />
                          <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control select2 select2bs4" style="width: 100%;" name="status">
                        <option value="proses">proses</option>
                        <option value="disetujui">disetujui</option>
                        <option value="ditolak">ditolak</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jenis Cuti</label>
                    <select class="form-control select2 select2bs4" style="width: 100%;" name="jenis_cuti">
                        <option value="tahunan">tahunan</option>
                        <option value="besar">besar</option>
                        <option value="sakit">sakit</option>
                        <option value="bersalin">bersalin</option>
                        <option value="kepentingan">alasan penting</option>
                        <option value="lain-lain">Keterangan Lainnya</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Alamat Tujuan</label>
                    <input type="text" name="alamat_tujuan" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Kepentingan Cuti</label>
                    <input type="text" name="kepengingan_cuti" class="form-control">
                  </div>
                  <div class="form-group float-right">
                    <input type="submit" class="btn btn-primary" value="Tambah">
                  </div>
              </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            
            </div>
          </div>


          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">List cuti <b>{{ $employee->nama }}</b></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Pegawai</th>
                  <th>Nama PJ</th>
                  <th>Kabag. Umum</th>
                  <th>Pengganti</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Mulai Cuti</th>
                  <th>Akhir Cuti</th>
                  <th>Jumlah Cuti</th>
                  <th>Status</th>
                  <th>Jenis Cuti</th>
                  <th>Alamat Tujuan</th>
                  <th>Kepentingan Cuti</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($cuti as $item)
                  <tr>
                    <td>{{ $item->employee->nama }}</td>
                    <td>{{ $item->pj->nama }}</td>
                    <td>{{ $item->kabag->nama }}</td>
                    <td>{{ $item->pg->nama }}</td>
                    <td>{{ date('d/M/Y',strtotime($item->tgl_pengajuan)) }}</td>
                    <td>{{ date('d/M/Y',strtotime($item->tgl_awal)) }}</td>
                    <td>{{ date('d/M/Y',strtotime($item->tgl_akhir)) }}</td>
                    <td>{{ $item->jml_cuti }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->jenis_cuti }}</td>
                    <td>{{ $item->alamat_tujuan }}</td>
                    <td>{{ $item->kepengingan_cuti }}</td>
                    <td>
                      <a href="{{ route('employee.cuti.showupdate',$item->id) }}" class="btn btn-success">Edit</a>
                      <a onclick="return confirm('Are you sure?')" href="{{ route('employee.cuti.destroy',$item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Pegawai</th>
                  <th>Nama PJ</th>
                  <th>Kabag. Umum</th>
                  <th>Pengganti</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Mulai Cuti</th>
                  <th>Akhir Cuti</th>
                  <th>Jumlah Cuti</th>
                  <th>Status</th>
                  <th>Jenis Cuti</th>
                  <th>Alamat Tujuan</th>
                  <th>Kepentingan Cuti</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            
            </div>
          </div>
          
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<form id="form-delete" method="POST">
  @csrf
  @method('delete')
</form>
@push('scripts-select')

<script>
  $(document).ready(function () {
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#reservationdate2').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#reservationdate3').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#reservationdate4').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#reservationdate5').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    $('.btn-delete').on('click', function () {
        console.log("data");
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