@extends('layouts.main')
@section('title', 'Form Edit Drink')
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            {{-- FORM EDIT DRINK DISINI --}}
            <form action="/update/{{ $mv->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label> Merek </label>
                    <input type="text" name="merek" class="form-control" value="{{ $mv ->merek }}">
                </div>
                <div class="form-group">
                    <label> Distributor </label>
                    <input type="text" name="distributor" class="form-control" value="{{ $mv->distributor }}">
                </div>
                <div class="form-group">
                    <label> Stok </label>
                    <input type="number" min="0" max="10000" name="stok" class="form-control" value="{{ $mv->stok }}" required>
                </div>
                <div class="form-group">
                    <label> Foto </label>
                    <input type="file" name="foto" class="form-control-file" accept="image/*">
                </div>
                <div class="form-group">
                    <img src="{{ asset('/storage/'.$mv->foto) }}" alt="{{ $mv->foto }}" height="80" width="80">
                </div>
                <div class="form-control">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>

@endsection