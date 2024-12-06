<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-semibold mb-4">To-Do List</h3>

                    <!-- Display To-Do List -->
                    @if($todos->isEmpty())
                        <p>No tasks found.</p>
                    @else
                        <table class="min-w-full bg-white border">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b">ID</th>
                                    <th class="px-6 py-3 border-b">Title</th>
                                    <th class="px-6 py-3 border-b">Description</th>
                                    <th class="px-6 py-3 border-b">Completed</th>
                                    <th class="px-6 py-3 border-b">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todos as $todo)
                                    <tr>
                                        <td class="px-6 py-4 border-b">{{ $todo->id }}</td>
                                        <td class="px-6 py-4 border-b">
                                            <form action="{{ route('todos.update', $todo->id) }}" method="POST" id="update-form-{{ $todo->id }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="title" value="{{ $todo->title }}" class="border px-2 py-1 w-full">
                                        </td>
                                        <td class="px-6 py-4 border-b">
                                                <input type="text" name="description" value="{{ $todo->description }}" class="border px-2 py-1 w-full">
                                        </td>
                                        <td class="px-6 py-4 border-b text-center">
                                                <input type="checkbox" name="is_completed" value="1" {{ $todo->is_completed ? 'checked' : '' }}>
                                        </td>
                                        <td class="px-6 py-4 border-b">
                                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                                            </form>

                                            <!-- Delete Form -->
                                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="inline-block ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
