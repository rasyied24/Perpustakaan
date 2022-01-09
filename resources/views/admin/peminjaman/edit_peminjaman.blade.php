@extends('layouts.admin')
@section('header', 'Peminjaman')
@push('css')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('asset-admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('asset-admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset-admin/dist/css/adminlte.min.css') }}">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Add Peminjaman</h3>
                </div>
                <form action="{{ url('data/peminjaman/' . $peminjaman->id) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Anggota</label>
                            <select name="id_anggota" class="form-control">
                                <option>Anggota</option>
                                @foreach ($anggota as $data)
                                    <option {{ $data->id == $peminjaman->id_anggota ? 'selected' : '' }}
                                        value="{{ $data->id }}">
                                        {{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Date -->
                        <div class="form-group">
                            <label>Tanggal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input value="{{ $peminjaman->tgl_pinjam }}" name="tgl_pinjam" type="text"
                                    class="form-control" data-inputmask-alias="datetime"
                                    data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input value="{{ $peminjaman->tgl_kembali }}" name="tgl_kembali" type="text"
                                    class="form-control" data-inputmask-alias="datetime"
                                    data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Buku</label>
                            <select name="judul[]" class="select2" multiple="multiple"
                                data-placeholder="Select a State" style="width: 100%;">
                                @foreach ($buku as $data)
                                    <option {{ in_array($data->id, $buku1->toArray()) ? 'selected' : '' }}
                                        value="{{ $data->id }}">
                                        {{ $data->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status">
                                <option {{ 0 == $peminjaman->status ? 'selected' : '' }} value="0">Belum di Kembalikan
                                </option>
                                <option {{ 1 == $peminjaman->status ? 'selected' : '' }}value="1">Sudah di Kembalikan
                                </option>
                            </select>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- jQuery -->
    <script src="{{ asset('asset-admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('asset-admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('asset-admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('asset-admin/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('asset-admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
        })
    </script>
@endpush
