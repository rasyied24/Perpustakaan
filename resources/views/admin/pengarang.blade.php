@extends('layouts.admin')
@section('header', 'Pengarang')
@section('content')
    <componen id="controller">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="#" @click="addData()" class="btn btn-sm btn-success pull-right">Add Pengarang</a>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telp</th>
                                    <th>Alamat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pengarang as $num => $pengarang)
                                    <tr>
                                        <td>{{ $num + 1 }}.</td>
                                        <td>{{ $pengarang->nama_pengarang }}</td>
                                        <td>{{ $pengarang->email }}</td>
                                        <td>{{ $pengarang->telp }}</td>
                                        <td>{{ $pengarang->alamat }}</td>
                                        <td class="text-right">
                                            <a href="#" @click="infoData({{ $pengarang }})"
                                                class="btn btn-primary btn-sm">View</a>
                                            <a href="#" @click="editData({{ $pengarang }})"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" @click="deleteData({{ $pengarang->id }})"
                                                class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form :action="actionUrl" method="post" autocomplete="off">
                        <div class="modal-header">
                            <h4 class="modal-title" v-if="!editStatus">Add Pengarang</h4>
                            <h4 class="modal-title" v-if="editStatus">Edit Pengarang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="_method" value="put" v-if="editStatus">
                            @csrf
                            <div class="form-group">
                                <label>Nama Pengarang</label>
                                <input type="text" class="form-control" name="nama_pengarang" :value="data.nama_pengarang"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" :value="data.email" required>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" class="form-control" name="telp" :value="data.telp" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>

                                <input type="text" class="form-control" name="alamat" :value="data.alamat" required>
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

        <div class="modal fade modal-view">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form :action="actionUrl" method="post" autocomplete="off">
                        <div class="modal-header">
                            <h4 class="modal-title" v-if="infoStatus">View Pengarang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="_method" value="get" v-if="infoStatus">
                            @csrf
                            <div class="form-group">
                                <label>Nama Pengarang</label>
                                <input type="text" class="form-control" name="nama_pengarang" :value="data.nama_pengarang"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" :value="data.email" disabled>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" class="form-control" name="telp" :value="data.telp" disabled>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>

                                <input type="text" class="form-control" name="alamat" :value="data.alamat" disabled>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </componen>
@endsection
@push('js')
    <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                editStatus: false,
                data: {},
                actionUrl: 'tes'
            },
            mounted: function() {

            },
            methods: {
                addData() {
                    this.editStatus = false;
                    this.actionUrl = '{{ url('data/pengarang') }}';
                    this.data = {};
                    $('.modal-default').modal();
                },
                editData(pengarang) {
                    this.editStatus = true;
                    this.actionUrl = '{{ url('data/pengarang') }}' + '/' + pengarang.id;
                    this.data = pengarang;
                    $('.modal-default').modal();
                    console.log(this.data)
                },
                infoData(pengarang) {
                    this.infoStatus = true;
                    this.actionUrl = '{{ url('data/pengarang') }}'
                    this.data = pengarang;
                    $('.modal-view').modal();
                    console.log(this.data)
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('data/pengarang') }}'
                    if (confirm("Are you sure??")) {
                        axios.post(this.actionUrl + '/' + id, {
                            _method: 'DELETE'
                        }).then(response => {
                            location.reload();
                        });
                    }
                }
            }
        });
    </script>
@endpush
