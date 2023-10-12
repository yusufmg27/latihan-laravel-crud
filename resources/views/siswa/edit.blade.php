@extends('layout/aplikasi')

@section('konten')
<form method="post" action="{{  '/siswa/'.$data->id }}">
    @csrf
    @method('put')
    <div class="mb-3">
      <h1>Id: {{ $data->id }}</h1>
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" id="name" value="{{ $data->name }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description">{{ $data->description }}</textarea>
      </div>
      <div class="mb-3">
        <label for="seq" class="form-label">Seq</label>
        <input type="text" class="form-control" name="seq" id="seq" value="{{ $data->seq }}">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Edit</button>
        <a href="/siswa" class="btn btn-warning">Kembali</a>
      </div>
  </form>
@endsection