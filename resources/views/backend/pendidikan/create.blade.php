@extends('backend.layouts.template');
@section('content')
{{-- @dd($pendidikan) --}}


<section class="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-header"><i class="icon_document_alt"></i>Riwayat Hidup</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home"></i><a href="{{ url('dashboard') }}"> Home</a></li>
                    <li class="breadcrumb-item"><i class="icon_document_alt"></i> Riwayat Hidup</li>
                    <li class="breadcrumb-item"><i class="fa fa-files-o"></i> Pendidikan</li>
                </ol>
            </div>
        </div>

        {{-- Form Validation --}}
        <div class="row">
            <div class="col-md-12">
                <section class="card">
                    <header class="card-header">
                        {{ isset($admin_lecturer) ? 'Mengubah' : 'Menambahkan' }} Pendidikan
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
                            {{-- <form method="POST" action="{{ route('pendidikan.store') }}" class="form-validate form-horizontal" id="pendidikan_form">
                                {!! csrf_field() !!}
                                <br>
                                <div class="form-grup mb-3">
                                    <div class="row">
                                        <label for="cname" class="control-label col-md-3">Nama Sekolah <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="nama" name="nama" minlength="5" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grup mb-3">
                                    <div class="row">
                                        <label for="cname" class="control-label col-md-3">Tingkatan <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <select class="form-control m-bot15" name="tingkatan" id="tingkatan">
                                                <option value="1">TK</option>
                                                <option value="2">SD</option>
                                                <option value="3">SMP</option>
                                                <option value="4">SMA</option>
                                                <option value="5">D3</option>
                                                <option value="6">D4/S1</option>
                                                <option value="7">S2</option>
                                                <option value="8">S3</option>
                                            </select>
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
                                                <a href="{{ route('pendidikan.index') }}"><button class="btn btn-default" type="button">Cancel</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> --}}

                            <form method="POST" action="{{ isset($pendidikan) ? route('pendidikan.update', $pendidikan->id) : route('pendidikan.store') }}" class="form-validate form-horizontal" id="pendidikan_form">
                                {!! csrf_field() !!}
                                {!! isset($pendidikan) ? method_field('PUT') : '' !!}
                                <input type="hidden" name="id" value="{{ $pendidikan->id }}">
                                <br>
                                <div class="form-grup mb-3">
                                    <div class="row">
                                        <label for="cname" class="control-label col-md-3">Nama Perusahaan <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="nama" name="nama" minlength="5" value="{{ isset($pendidikan) ? $pendidikan->nama : '' }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grup mb-3">
                                    <div class="row">
                                        <label for="cname" class="control-label col-md-3">Tingkatan <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <select class="form-control m-bot15" name="tingkatan" id="tingkatan">
                                                <option value="1" {{ isset($pendidikan) && $pendidikan->tingkatan == 1 ? 'selected' : ''  }}>TK</option>
                                                <option value="2" {{ isset($pendidikan) && $pendidikan->tingkatan == 2 ? 'selected' : ''  }}>SD</option>
                                                <option value="3" {{ isset($pendidikan) && $pendidikan->tingkatan == 3 ? 'selected' : ''  }}>SMP</option>
                                                <option value="4" {{ isset($pendidikan) && $pendidikan->tingkatan == 4 ? 'selected' : ''  }}>SMA</option>
                                                <option value="5" {{ isset($pendidikan) && $pendidikan->tingkatan == 5 ? 'selected' : ''  }}>D3</option>
                                                <option value="6" {{ isset($pendidikan) && $pendidikan->tingkatan == 6 ? 'selected' : ''  }}>D4/S1</option>
                                                <option value="7" {{ isset($pendidikan) && $pendidikan->tingkatan == 7 ? 'selected' : ''  }}>S2</option>
                                                <option value="8" {{ isset($pendidikan) && $pendidikan->tingkatan == 8 ? 'selected' : ''  }}>S3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grup mb-3">
                                    <div class="row">
                                        <label for="curl" class="control-label col-md-3">Tahun Masuk <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" maxlength="4" value="{{ isset($pendidikan) ? $pendidikan->tahun_masuk : '' }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-grup mb-3">
                                    <div class="row">
                                        <label for="curl" class="control-label col-md-3">Tahun Selesai <span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" id="tahun_keluar" name="tahun_keluar" maxlength="4" value="{{ isset($pendidikan) ? $pendidikan->tahun_keluar : '' }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-grup">
                                        <div class="row">
                                            <div class="offset-md-3 col-md-9">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <a href="{{ route('pendidikan.index') }}"><button class="btn btn-default" type="button">Cancel</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection

