@extends('layouts.main')
@section('title', 'Form Add Drink')
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            {{-- FORM ADD DRINK --}}
            <form action="/save" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label> Merek </label>
                    <input type="text" name="merek" class="form-control" required>
                </div>
                <div class="form-group">
                    <label> Distributor </label>
                    <input type="text" name="distributor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label> Stok </label>
                    <input type="number" min="0" max="10000" name="stok" class="form-control" required>
                </div>
                <div class="form-group">
                    <label> Foto </label>
                    <input type="file" name="foto" class="form-control-file" accept="image/*">
                </div>
                <div class="form-control">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection
