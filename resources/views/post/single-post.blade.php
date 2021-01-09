@extends('layouts.app')

@section('content')
<div>
    <ul>
        <li>{{ $post->body }}</li>
        <like :post="{{ $post->id }}"></like>
        <dislike :post="{{ $post->id }}"></dislike>
    </ul>
</div>
@endsection 