@extends('layout/aplikasi')

@section('konten')
<form method="post" action="/siswa">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name<p class="d-inline" style="color: red">*</p></label>
      <input type="text" class="form-control" name="name" id="name" value="{{ Session::get('name') }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description">{{ Session::get('description') }}</textarea>
      </div>
      <div class="mb-3">
        <label for="seq" class="form-label">Seq<p class="d-inline" style="color: red">*</p></label>
        <input type="text" class="form-control" name="seq" id="seq" value="{{ Session::get('seq') }}">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/siswa" class="btn btn-warning">Kembali</a>
      </div>
  </form>
@endsection