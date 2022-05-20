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
              <h3 class="card-title">Edit data Pendidikan RS PKU Muhammadiyah Sekapuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                <form action="{{ route('pendidikan_update', $id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <div class="form-group">
                        <label>Tingkat</label>
                        <input type="text" name="tingkat" class="form-control" value="{{ old('tingkat',$tingkat) }}" required>
                      </div>
                      <div class="form-group">
                        <label>Index</label>
                        <input type="number" name="index" class="form-control" value="{{ old('index',$index) }}" required>
                      </div>
                      <div class="form-group">
                        <label>Gaji Pokok 1</label>
                        <input type="number" name="gapok1" class="form-control" value="{{ old('gapok1',$gapok1) }}" required>
                      </div>
                      <div class="form-group">
                        <label>Kenaikan</label>
                        <input type="number" name="kenaikan" class="form-control" value="{{ old('kenaikan',$kenaikan) }}" required>
                      </div>
                      <div class="form-group">
                        <label>Maksimal</label>
                        <input type="number" name="maksimal" class="form-control" value="{{ old('maksimal',$maksimal) }}" required>
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
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH DATA UNIT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/unit" method="POST">
        @csrf
      <div class="modal-body">
            <div class="form-group">
              <label>Kode Unit</label>
              <input type="text" name="kode_unit" class="form-control" placeholder="Kode Unit">
            </div>
            <div class="form-group">
              <label>Nama Unit</label>
              <input type="text" name="nama_unit" class="form-control" placeholder="Nama Unit">
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

@endsection