@extends('layouts.admin')
@section('header', 'Katalog')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Katalog</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $katalog->nama }}</td>
                                <td class="text-right">
                                    <a href="{{ url('katalog') }}" class="btn btn-primary btn-sm">Back</a>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
