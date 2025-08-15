
@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    @foreach($posts as $post)
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$post['title']}}</div>
        </div>
        </div>
    @endforeach
@endsection