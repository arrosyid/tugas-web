<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request Dgn Input</title>

     <!-- Vendor CSS Files -->
     <link href="{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
     <link href="{{ asset("assets/vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">
     <link href="{{ asset("assets/vendor/boxicons/css/boxicons.min.css") }}" rel="stylesheet">
     <link href="{{ asset("assets/vendor/quill/quill.snow.css") }}" rel="stylesheet">
     <link href="{{ asset("assets/vendor/quill/quill.bubble.css") }}" rel="stylesheet">
     <link href="{{ asset("assets/vendor/remixicon/remixicon.css") }}" rel="stylesheet">
     <link href="{{ asset("assets/vendor/simple-datatables/style.css") }}" rel="stylesheet">

     <!-- Template Main CSS File -->
     <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">Form Validation Dengan Laravel</h1>

                <form action="{{ route('pegawai') }}" method="post">
                @csrf
                <br>

                <div class="form-group">
                    <label for="nama" class="control-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" placeholder="Nama Lengkap" value="{{ old('nama') }}">
                    @if ($errors->has('nama'))
                    <span class="text-danger small">
                        <p>{{ $errors->first('nama') }}</p>
                    </span>
                    @endif
                </div><br>

                <div class="form-group">
                    <label for="alamat" class="control-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" placeholder="Alamat" value="{{ old('alamat') }}">
                    @if ($errors->has('alamat'))
                    <span class="text-danger small">
                        <p>{{ $errors->first('alamat') }}</p>
                    </span>
                    @endif
                </div>
                <br>
                <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
