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
              <h3 class="card-title">Edit data Cuti <b>{{ $cuti->employee->nama }}</b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <form action="{{ route('employee.cuti.update',$cuti->id) }}" method="POST">
                      @csrf
                      @method('put')
                      <input type="hidden" name="employee_id" value="{{ $cuti->employee->id }}">
                      <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ $cuti->employee->nip }}" readonly>
                      </div>
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $cuti->employee->nama }}" readonly>
                      </div>
                        <div class="form-group">
                          <label>Jabatan</label>
                          <input type="text" name="jabatan" class="form-control" value="{{ $cuti->employee->jbtn }}" readonly>
                      </div>
                      <div class="form-group">
                        <label>PJ. Terkait</label>
                        <select class="form-control select2 select2bs4" style="width: 100%;" name="pj_terkait">
                          @foreach ($emp as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $cuti->pj_terkait ? 'selected' : '' }}>{{ $item->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Pengganti</label>
                        <select class="form-control select2 select2bs4" style="width: 100%;" name="pengganti">
                          @foreach ($emp as $item)
                           <option value="{{ $item->id }}" {{ $item->id == $cuti->pengganti ? 'selected' : '' }}>{{ $item->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Kabag. Umum</label>
                        <select class="form-control select2 select2bs4" style="width: 100%;" name="kabag_umum">
                          @foreach ($emp as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $cuti->kabag_umum ? 'selected' : '' }}>{{ $item->nama }}</option>
                          @endforeach
                        </select>
                      </div>
                        <div class="form-group">
                          <label>Tanggal Pengajuan</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="tgl_pengajuan" data-target="#reservationdate" value="{{ date('d/m/Y',strtotime($cuti->tgl_pengajuan)) }}"/>
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Awal Cuti</label>
                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="tgl_awal" data-target="#reservationdate2" value="{{ date('d/m/Y',strtotime($cuti->tgl_awal)) }}"/>
                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label>Akhir Cuti</label>
                            <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="tgl_akhir" data-target="#reservationdate3" value="{{ date('d/m/Y',strtotime($cuti->tgl_akhir)) }}"/>
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
                          <input type="text" name="alamat_tujuan" class="form-control" value="{{ $cuti->alamat_tujuan }}">
                        </div>
                        <div class="form-group">
                          <label>Kepentingan Cuti</label>
                          <input type="text" name="kepengingan_cuti" class="form-control" value="{{ $cuti->kepengingan_cuti }}">
                        </div>
                        <div class="form-group float-right">
                          <input type="submit" class="btn btn-success" value="GANTI">
                        </div>
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
  });
</script>
@endpush

@endsection