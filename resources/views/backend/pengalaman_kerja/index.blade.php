@extends('backend.layouts.template');
@section('content')

<section class="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-header"><i class="icon_document_alt"></i>Riwayat Hidup</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="{{ url('dashboard') }}"> Home</a></li>
                    <li class="breadcrumb-item"><i class="icon_document_alt"></i> Riwayat Hidup</li>
                    <li class="breadcrumb-item"><i class="fa fa-files-o"></i> Pengalaman Kerja</li>
                </ol>
            </div>
        </div>

        {{-- Form Validation --}}
        <div class="row">
            <div class="col-md-12">
                <section class="card">
                    <header class="card-header">
                        {{ isset($admin_lecturer) ? 'Mengubah' : 'Menambahkan' }} Pengalaman Kerja
                    </header>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There Were Some Problem With Your Input.
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="form">
                            <form method="POST" action="{{ route('pengalaman_kerja.store') }}" class="form-validate form-horizontal" id="pengalaman_kerja_form">
                                {!! csrf_field() !!}
                                <br>
                                <div class="form-grup mb-3">
                                    <div class="row">
                                        <label for="cname" class="control-label col-md-3">Nama Perusahaan <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="nama" name="nama" minlength="5" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grup mb-3">
                                    <div class="row">
                                        <label for="cname" class="control-label col-md-3">Jabatan <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="jabatan" name="jabatan" minlength="2" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grup mb-3">
                                    <div class="row">
                                        <label for="curl" class="control-label col-md-3">Tahun Masuk <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" maxlength="4" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grup mb-3">
                                    <div class="row">
                                        <label for="curl" class="control-label col-md-3">Tahun Selesai <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" id="tahun_keluar" name="tahun_keluar" maxlength="4" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-grup">
                                        <div class="row">
                                            <div class="offset-md-3 col-md-9">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <a href="{{ route('pengalaman_kerja.index') }}"><button class="btn btn-default" type="button">Cancel</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br><br>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <th><i class="icon_bag"></i>Nama</th>
                                    <th><i class="icon_dovument"></i>Jabatan</th>
                                    <th><i class="icon_calendar"></i>Tahun Masuk</th>
                                    <th><i class="icon_calendar"></i>Tahun Selesai</th>
                                    <th><i class="icon_cogs"></i>Action</th>
                                </tr>
                                @foreach ($pengalaman_kerja as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->tahun_masuk }}</td>
                                    <td>{{ $item->tahun_keluar }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('pengalaman_kerja.edit',$item->id) }}" class="btn btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection
