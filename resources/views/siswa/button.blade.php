<a class='btn btn-success btn-sm' href='{{ url('/siswa/'.$row->id) }}'>Detail</a>
<a class='btn btn-warning btn-sm' href='{{ url('/siswa/'.$row->id.'/edit') }}'>Edit</a>
@if ($row->status === 'inactive' && $row->is_deleted)
<form onsubmit="return confirm('Apakah Anda Ingin Mengembalikan Data?')" class="d-inline" action="{{ route('siswa.activate', $row->id) }}" method="post">
    @csrf
    @method('patch')
    <button class="btn btn-primary btn-sm" type="submit">Activate</button>
</form>
@else
<form onsubmit="return confirm('Apakah Anda Ingin Menghapus Data?')" class="d-inline" action="{{ route('siswa.destroy', $row->id) }}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
</form>
@endif