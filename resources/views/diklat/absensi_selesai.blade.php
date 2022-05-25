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
              <h3 class="card-title">Absensi Pulang RS PKU Muhammadiyah Sekapuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                 <form action="{{ route('absen.selesai') }}" method="post" id="absen">
                    @csrf
                    @method('put')
                    <input type="hidden" name="diklat_id" value="{{ $id }}">
                    <input type="hidden" name="nip">
                    <div class="row">
                      <div class="col-4">
                        <div id="reader" width="600px"></div>
                      </div>
                    </div>
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
          let find = false;

          function onScanSuccess(decodedText, decodedResult) {
            if (!!decodedText && !find) {
              find = true;

              $('[name="nip"]').val(decodedText);
              $('#absen').submit();
            }
          }

          function onScanFailure(error) {
            // console.warn(`Code scan error = ${error}`);
            console.log(1);
          }

          let html5QrcodeScanner = new Html5QrcodeScanner("reader", {
            fps: 5,
            qrbox: {
              width: 250,
              height: 250
            }
          });

          html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
@endpush

@endsection