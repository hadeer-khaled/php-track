
@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
<div class="max-w-sm rounded overflow-hidden shadow-lg">
<div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">{{$post->title}}</div>
    <div class="font-bold text-xl mb-2">{{$post->content}}</div>
    <div class="font-bold text-xl mb-2">{{$post->user->name}}</div>
</div>
</div>
@endsection
