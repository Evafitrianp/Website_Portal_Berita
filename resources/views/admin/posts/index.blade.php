<!-- resources/views/admin/posts/index.blade.php -->
@extends('layouts.app')

@section('title', 'Kelola Berita')

@section('content')
<div class="container">
    <h1>Kelola Berita</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Berita</a>
    <table class="table" id="posts-table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#posts-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('posts.data') }}",
            columns: [
                { data: 'title', name: 'title' },
                { data: 'author', name: 'author' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
