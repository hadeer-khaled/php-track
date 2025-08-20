<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Create Post') }}
      </h2>
  </x-slot>

<div class="w-full max-w-xs">
  <form action="{{route('posts.store')}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
  @csrf
  <!-- <input type="hidden" name="_token" value="gdhdjdopdjdpjdvsdl">   -->
    <!-- <input type="hidden" name="_method" value="PUT"> -->
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        Title
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
       id="title" type="text" placeholder="Title" name="title" value="{{ old('title') }}">

       @error('title')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
       @enderror
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
        content
      </label>
      <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="content" placeholder="content" name="content">
        {{ old('content') }}
      </textarea>
      @error('content')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
       @enderror
    </div>

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

    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Create New Post
      </button>
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;2020 Acme Corp. All rights reserved.
  </p>
</div>
</x-app-layout>