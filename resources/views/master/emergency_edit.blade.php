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
              <h3 class="card-title">Edit data Index Emergency RS PKU Muhammadiyah Sekapuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                <form action="{{ route('emergencies.update', $id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Kode Emergency</label>
                        <input type="text" name="kode" class="form-control" value="{{ old('kode',$kode) }}" required>
                        @error('kode_resiko')
                            {{ $message }}
                        @enderror
                      </div>
                      <div class="form-group">
                        <label>Nama Emergency</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama',$nama) }}" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Index</label>
                        <select class="form-control" name="index" id="exampleFormControlSelect1">
                          <option value="{{ $index }}">{{ $index }}</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                        </select>
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

@endsection