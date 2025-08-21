<x-app-layout>
    <div>
        <table class="table-auto">
            <thead>
                <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Is Admin</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin  }}</td>
                    <td>
                        <form action="{{route('admin.users.change.role', $user)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <x-button type="submit" class="text-white {{ $user->is_admin ? 'bg-green-500' : 'bg-red-500' }}">
                                {{$user->is_admin ? 'Remove Admin' : 'Make Admin'}}
                            </x-button>
                        </form>
                    </td>
                </tr>
                @endforeach
              
               
            </tbody>
        </table>
    </div>
</x-app-layout>