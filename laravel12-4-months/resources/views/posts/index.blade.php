
<x-app-layout>

    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('All Posts') }}
      </h2>
  </x-slot>

@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded">
        {{ session('success') }}
    </div>
@endif

    @foreach($posts as $post)
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{$post->title}}</div>
            <div class="font-bold text-xl mb-2">{{$post->created_at}}</div>

        </div>
        <div class="px-6 py-4">
            <x-button type="button" class="bg-blue-500 hover:bg-blue-700">
                <a href="{{ route('posts.show', $post->id) }}">View Details</a>
            </x-button>
        </div>
    </div>
    @endforeach


</x-app-layout>
