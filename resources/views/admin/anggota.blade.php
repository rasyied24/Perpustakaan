@extends('layouts.admin')

@section('header', 'Anggota')


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
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <a href="#" @click="addData()" class="btn btn-primary">Add Anggota</a>
                    </div>
                    <div class="col-md-3">
                        <select name="sex" class="form-control">
                            <option value="0">Semua Jenis Kelamin</option>
                            <option value="P">Perempuan</option>
                            <option value="L">Laki-Laki</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>Nama Anggota</th>
                            <th>Jenis Kelamin</th>
                            <th>Telp</th>
                            <th>Alamat</th>
                            <th>Email</th>
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
                            <h4 class="modal-title" v-if="!editStatus">Tambah Anggota</h4>
                            <h4 class="modal-title" v-if="editStatus">Edit Anggota</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Anggota</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama Anggota"
                                        :value="data.name">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="sex" class="form-control">
                                        <option :selected="data.sex == 'P' " value="P">Perempuan</option>
                                        <option :selected="data.sex == 'L' " value="L">Laki-Laki</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="number" class="form-control" name="telp" placeholder="Telepon"
                                        :value="data.telp">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat"
                                        :value="data.alamat">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        :value="data.email">
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
        var actionUrl = '{{ url('data/anggota') }}';
        var columns = [{
                data: 'name',
                class: 'text-center',
                orderable: true
            },
            {
                data: 'sex',
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
                data: 'email',
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
    <script type="text/javascript">
        $('select[name=sex]').on('change', function() {
            sex = $('select[name=sex]').val();

            if (sex == 0) {
                controller.table.ajax.url(actionUrl).load();
            } else {
                controller.table.ajax.url(actionUrl + '?sex=' + sex).load();
            }
        });
    </script>
@endpush
