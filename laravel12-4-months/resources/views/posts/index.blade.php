
@extends('layouts.app')

@section('title', 'Posts')

@section('content')
@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded">
        {{ session('success') }}
    </div>
@endif
    @foreach($posts as $post)
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$post->title}}</div>
        </div>
        </div>
    @endforeach
@endsection