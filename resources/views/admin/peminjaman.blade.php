@extends('layouts.admin')

@section('header', 'Peminjaman')


@push('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('asset-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('asset-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('asset-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')

    @role('petugas')
        <component id="controller">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ url('data/peminjaman/create') }}" class="btn btn-primary">Add Peminjaman</a>
                        </div>
                        <div class="col-md-4">
                            <select name="status" class="form-control">
                                <option value="2">Filter Status</option>
                                <option value="0">Belum Kembali</option>
                                <option value="1">Sudah Kembali</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="status" class="form-control">
                                <option value="2">Filter Tanggal Pinjam</option>
                                <option value="0">Belum Kembali</option>
                                <option value="1">Sudah Kembali</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Nama Peminjam</th>
                                <th>Lama Pinjam</th>
                                <th>Total Buku</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal fade modal-default" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form class="form-horizontal" method="post" :action="actionUrl" autocomplete="off"
                            @submit="submitForm($event, data.id)">
                            <div class="modal-header">
                                <h4 class="modal-title" v-if="!editStatus">Tambah Peminjaman</h4>
                                <h4 class="modal-title" v-if="editStatus">Edit Peminjaman</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tanggal Pinjam</label>
                                        <input type="text" class="form-control" name="tgl_pinjam" placeholder="Tanggal Pinjam"
                                            :value="data.tgl_pinjam">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Kembali</label>
                                        <input type="text" class="form-control" name="tgl_kembali"
                                            placeholder="Tanggal Kembali" :value="data.tgl_kembali">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Peminjam</label>
                                        <input type="number" class="form-control" name="id_anggota"
                                            placeholder="Nama Peminjam" :value="data.id_anggota">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </component>
    @endrole

@endsection

@push('js')

    <script type="text/javascript" src="{{ asset('asset-admin/plugins/datatables/jquery.datatables.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('asset-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('asset-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('asset-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script type="text/javascript">
        var actionUrl = '{{ url('data/peminjaman') }}';
        var columns = [{
                data: 'tgl_pinjam',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'tgl_kembali',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'nama_anggota',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'lama_pinjam',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'total_buku',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'total_bayar',
                class: 'text-center',
                orderable: true
            },
            {
                render: function(index, row, data, meta) {
                    var status = data.status == 0 ? 'belum dikembalikan' : 'sudah dikembalikan';
                    return status;
                },
                orderable: false,
                width: '100px',
                class: 'text-center'
            },
            {
                render: function(index, row, data, meta) {
                    return `<a href = "data/peminjaman/` + data.id + `/edit"
                    class = "btn btn-warning btn-sm">
                        Edit </a>

                        <a href = "#"
                    class = "btn btn-danger btn-sm"
                    onclick = "controller.deleteData(event, ${data.id})" >
                        Hapus </a>`;
                },
                orderable: false,
                width: '100px',
                class: 'text-center'
            },
        ];
    </script>
    <script src="{{ asset('js/data.js') }}"></script>
    <script type="text/javascript">
        $('select[name=status]').on('change', function() {
            status = $('select[name=status]').val();

            if (status == 2) {
                controller.table.ajax.url(actionUrl).load();
            } else {
                controller.table.ajax.url(actionUrl + '?status=' + status).load();
            }
        });
    </script>
@endpush
