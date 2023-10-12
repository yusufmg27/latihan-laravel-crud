@extends('layout/aplikasi')

@section('konten')
<div>
    <h1>Id: {{ $data->id }}</h1>
    <hr>
    <p>
        <b>Name: </b> {{ $data->name }}
    </p>
    <p>
        <b>Description: </b> {{ $data->description }}
    </p>
    <p>
        <b>Seq: </b> {{ $data->seq }}
    </p>
    <p class="d-inline">
        <b>Status: </b><p class="badge rounded-pill m-2 {{ $data -> status == 'active' ? 'bg-success' : 'bg-secondary' }}" >{{$data->status}}</p>
    </p>
    <p>
        <b>Created At: </b> {{$data->created_at}}
    </p>
    <p>
        <b>Updated At: </b> {{$data->updated_at}}
    </p>
    <a href="/siswa" class="btn btn-primary">Kembali</a>
</div>
@endsection