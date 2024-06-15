@extends('layouts.app')

@section('title', 'Berita Terbaru')

@section('content')
<div class="container">
    <h1>Berita Terbaru</h1>
    @foreach($posts as $post)
        <div class="post">
            <h2><a href="{{ url('/post/' . $post->id) }}">{{ $post->title }}</a></h2>
            <p>{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
            <a href="{{ url('/post/' . $post->id) }}">Baca Selengkapnya</a>
        </div>
    @endforeach
    <a href="{{ url('/all-posts') }}">Semua Berita</a>
</div>
@endsection