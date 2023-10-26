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
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <div class="card-body">
                        <br>
                        <a href="{{ route('pendidikan.create') }}"><button class="btn btn-primary" type="button"><i class="fa fa-plus"> Tambah</i></button></a>
                        <br><br>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <th><i class="icon_bag"></i>Nama</th>
                                    <th><i class="icon_dovument"></i>Tingkatan</th>
                                    <th><i class="icon_calendar"></i>Tahun Masuk</th>
                                    <th><i class="icon_calendar"></i>Tahun Selesai</th>
                                    <th><i class="icon_cogs"></i>Action</th>
                                </tr>
                                @foreach ($pendidikan as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tingkatan }}</td>
                                    <td>{{ $item->tahun_masuk }}</td>
                                    <td>{{ $item->tahun_keluar }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('pendidikan.edit',$item->id) }}" class="btn btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
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
