@extends('layouts/app')

@section('content')
<div class="container">
<a href="/siswa/create" class="btn btn-primary mb-3">Add Data</a>
<form action="{{ route('export-excel') }}" method="POST" class="d-inline float end">
    @csrf
    <button class="btn btn-success mb-3 float-end">Export to Excel</button>
</form>
<form action="{{ route('export-pdf') }}" method="POST" class="d-inline float end">
    @csrf
    <button class="btn btn-danger mb-3 float-end mx-2">Export to PDF</button>
</form>
<div class="table-responsive">
<table class="table table-bordered mb-3" id="datatables">
    <thead>
        <tr class="text-center align-middle">
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Seq</th>
            <th>Status</th>
            <th>Is Deleted</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="text-center align-middle">
    </tbody>
</table>
</div>
</div>
<script>
     $(document).ready(function () {
      
      $('#datatables').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('siswa.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'name', name: 'name'},
              {data: 'description', name: 'description'},
              {data: 'seq', name: 'seq'},
              {data: 'status', name: 'status'},
              {data: 'is_deleted', name: 'is_deleted'},
              {data: 'created_at', name: 'created_at'},
              {data: 'updated_at', name: 'updated_at'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });    
    });

</script>
@endsection