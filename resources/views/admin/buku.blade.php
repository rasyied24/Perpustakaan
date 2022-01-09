@extends('layouts.admin')
@section('header', 'Buku')

@push('css')
@endpush

@section('content')
    <componen id="controller">
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary pull-right mb-1" data-toggle="modal" @click="addData()">
                    Add Buku
                </button>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" v-model="search" class="form-control" autocomplete="off"
                        placeholder="Cari Buku Berdasarkan Judul">
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12" v-for="buku in filteredList">
                <div class="info-box">
                    <div class="info-box-content">
                        <span class="info-box-text">@{{ buku . judul }} (@{{ buku . qty_stok }})</span>
                        <span class="info-box-number">Rp. @{{ formatPrice(buku . harga_pinjam) }},-<small></small></span>
                        <button type="button" class="btn btn-warning pull-right btn-sm mb-2" data-toggle="modal"
                            v-on:click="editData(buku)">
                            Edit Buku
                        </button>
                        <button type="button" class="btn btn-danger pull-right btn-sm" data-toggle="modal"
                            v-on:click="deleteData(buku.id)">
                            Delete Buku
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form :action="actionUrl" method="post" autocomplete="off">
                        <div class="modal-header">
                            <h4 class="modal-title" v-if="!editStatus">Add Buku</h4>
                            <h4 class="modal-title" v-if="editStatus">Edit Buku</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="_method" value="put" v-if="editStatus">
                            @csrf
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="text" class="form-control" name="isbn" :value="data.isbn" required>
                            </div>
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="judul" :value="data.judul" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" class="form-control" name="tahun" :value="data.tahun" required>
                            </div>
                            <div class="form-group">
                                <label>Id Penerbit</label>
                                <select name="id_penerbit" class="form-control">
                                    @foreach ($penerbit as $data)
                                        <option :selected="data.id_penerbit == {{ $data->id }}"
                                            value="{{ $data->id }}">
                                            {{ $data->nama_penerbit }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Id Pengarang</label>
                                <select name="id_pengarang" class="form-control">
                                    @foreach ($pengarang as $data)
                                        <option :selected="data.id_pengarang == {{ $data->id }}"
                                            value="{{ $data->id }}">
                                            {{ $data->nama_pengarang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Id Katalog</label>
                                <select name="id_katalog" class="form-control">
                                    @foreach ($katalog as $data)
                                        <option :selected="data.id_katalog == {{ $data->id }}"
                                            value="{{ $data->id }}">
                                            {{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Qty Stok</label>
                                <input type="text" class="form-control" name="qty_stok" :value="data.qty_stok" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Pinjam</label>
                                <input type="text" class="form-control" name="harga_pinjam" :value="data.harga_pinjam"
                                    required>
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

    </componen>

@endsection

@push('js')
    <script type="text/javascript">
        var actionUrl = '{{ url('data/buku') }}';
        var app = new Vue({
            el: '#controller',
            data: {
                search: '',
                data_buku: [],
                data: {},
                actionUrl: actionUrl,
                editStatus: false,
            },
            mounted: function() {
                this.databuku();
            },
            methods: {
                databuku() {
                    const _this = this;
                    $.ajax({
                        url: actionUrl,
                        method: 'GET',
                        success: function(data) {
                            _this.data_buku = JSON.parse(data);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                },
                formatPrice(value) {
                    let val = (value / 1).toFixed(0).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                },
                addData() {
                    this.editStatus = false;
                    this.actionUrl = '{{ url('data/buku') }}';
                    this.data = {};
                    $('.modal-default').modal();
                },
                editData(buku) {
                    this.editStatus = true;
                    this.actionUrl = '{{ url('data/buku') }}' + '/' + buku.id;
                    this.data = buku;
                    $('.modal-default').modal();
                    console.log(this.data)
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('data/buku') }}'
                    if (confirm("Are you sure??")) {
                        axios.post(this.actionUrl + '/' + id, {
                            _method: 'DELETE'
                        }).then(response => {
                            location.reload();
                        });
                    }
                }
            },
            computed: {
                filteredList() {
                    return this.data_buku.filter(buku => {
                        return buku.judul.toLowerCase().includes(this.search.toLowerCase())
                    })
                }
            }

        });
    </script>
@endpush
