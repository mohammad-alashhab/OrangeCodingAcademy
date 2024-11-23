<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Brands') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('brands.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">
                        {{ __('Add New Brand') }}
                    </a>

                    <form method="GET" class="mb-4">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search brands..." class="px-4 py-2 border rounded">
                        <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded">
                            Search
                        </button>
                    </form>

                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">{{ __('ID') }}</th>
                                <th class="px-4 py-2 border">{{ __('Name') }}</th>
                                <th class="px-4 py-2 border">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <td class="px-4 py-2 border">{{ $brand->id }}</td>
                                <td class="px-4 py-2 border">{{ $brand->name }}</td>
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('brands.edit', $brand->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        {{ __('Edit') }}
                                    </a>
                                    <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>