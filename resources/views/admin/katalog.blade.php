@extends('layouts.admin')
@section('header', 'Katalog')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('data/katalog/create') }}" class="btn btn-sm btn-success pull-right">Add Katalog</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Katalog</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_katalog as $num => $katalog)
                                <tr>
                                    <td>{{ $num + 1 }}.</td>
                                    <td>{{ $katalog->nama }}</td>
                                    <td class="text-right">
                                        <a href="{{ url('data/katalog/' . $katalog->id) }}"
                                            class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ url('data/katalog/' . $katalog->id . '/edit') }}"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ url('data/katalog', ['id' => $katalog->id]) }}" method="post">
                                            <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
