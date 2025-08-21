<x-app-layout>

    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('View Post') }}
      </h2>
  </x-slot>

<div class="max-w-sm rounded overflow-hidden shadow-lg">
<div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">{{$post->title}}</div>
    <div class="font-bold text-xl mb-2">{{$post->content}}</div>
    <div class="font-bold text-xl mb-2">{{$post->user->name}}</div>
    <div class="font-bold text-xl mb-2">{{$post->created_at}}</div>
    <div>
      @if($post->image_path)
        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" class="w-full h-auto">
        @endif
    </div>
</div>
 
<div>

    <form action="{{route('comments.store', $post->id)}}" method="POST">
        @csrf
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="user_id">
          Select User
        </label>
        <select name="user_id" id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
        </select>
      </div>

        <input type="text" name="content" placeholder="Add a comment...">
        <x-button type="submit" class="bg-blue-500 hover:bg-blue-700">
          Add Comment
        </x-button>
    </form>
</div>
    <div>
      <form method="POST" action="{{route('posts.destroy', $post->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
          Delete Post
        </button>
      </form>
    </div>
</div>
</x-app-layout>

