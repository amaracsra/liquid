@extends('layouts.main')
@section('title', 'Drink')
@section('artikel')
    <div class="card-header">
        <a href="/drink/add-form" class="btn btn-primary"><i class="bi bi-file-plus-fill"></i> ADD DRINK </a>
    </div>
    <div class="card-body">
        @if (session('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('alert') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Merek</th>
                    <th>Distributor</th>
                    <th>Stok</th>
                    <th>Foto</th>
                    <th> Aksi </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mv as $idx => $m)
                    <tr>
                        <td>{{ $idx + 1 }}</td>
                        <td>{{ $m->merek }}</td>
                        <td>{{ $m->distributor }}</td>
                        <td>{{ $m->stok }}</td>
                        <td>
                            <img src="{{ asset('/storage/'.$m->foto) }}" alt="{{ $m->foto }}" height="80" width="80">
                        </td>
                        <td>
                            <a href="/drink/edit-form/{{ $m->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                            <a href="/delete/{{ $m->id }}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection