@extends('layouts.app')

@section('title', 'Semua Berita')

@section('content')
<div class="container">
    <h1>Semua Berita</h1>
    @foreach($posts as $post)
        <div class="post">
            <h2><a href="{{ url('/post/' . $post->id) }}">{{ $post->title }}</a></h2>
            <p>{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
            <a href="{{ url('/post/' . $post->id) }}">Baca Selengkapnya</a>
        </div>
    @endforeach
</div>
@endsection