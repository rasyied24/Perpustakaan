@extends('layouts.admin')

@section('header', 'Penerbit')


@push('css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('asset-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('asset-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('asset-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')

    <component id="controller">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
            <div class="col-lg-12">
                <!-- small box -->
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" @click="addData()">
                            Add Penerbit
                        </button>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th>Alamat</th>
                                    <th style="width: 40px">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="modal fade modal-default" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal" method="post" :action="actionUrl" autocomplete="off"
                        @submit="submitForm($event, data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title" v-if="!editStatus">Tambah Data</h4>
                            <h4 class="modal-title" v-if="editStatus">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Penerbit</label>
                                    <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit"
                                        placeholder="Nama Penerbit" :value="data.nama_penerbit">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="Email" name="email" placeholder="Email"
                                        :value="data.email">
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="number" class="form-control" id="Telepon" name="telp"
                                        placeholder="Telepon" :value="data.telp">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" id="Alamat" name="alamat" placeholder="Alamat"
                                        :value="data.alamat">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </component>
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
        var actionUrl = '{{ url('data/penerbit') }}';
        var columns = [{
                data: 'nama_penerbit',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'email',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'telp',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'alamat',
                class: 'text-center',
                orderable: true
            },
            {
                render: function(index, row, data, meta) {
                    return `<a href = "#"
                    class = "btn btn-warning btn-sm"
                    onclick = "controller.editData(event, ${meta.row})" >
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

@endpush
