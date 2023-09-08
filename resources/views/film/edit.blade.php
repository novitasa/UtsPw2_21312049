@extends('layout.master')

@section('judul')
Edit Fil
@endsection

@section('content')
<form  method="post" action="/film/{{ $film->id }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="judul" value="{{ $film->judul}}" class="form-control">
    </div>
    @error('nama')
        <div class="alert alert-danger">{{$message }}</div>
    @enderror

    <div class="form-group">
        <label>Umur</label>
        <input type="text" name="ringkasan" value="{{ $film->ringkasan}}" class="form-control">
    </div>
    @error('umur')
        <div class="alert alert-danger">{{$message }}</div>
    @enderror

    <div class="form-group">
        <label>Bio</label>
        <textarea class="form-control" name="tahun">{{ $film->tahun}}</textarea>
    </div>
    @error('bio')
        <div class="alert alert-danger">{{$message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endsection