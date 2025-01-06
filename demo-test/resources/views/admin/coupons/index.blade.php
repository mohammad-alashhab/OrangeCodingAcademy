<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Coupons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <a href="{{ route('coupons.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                            {{ __('Create New Coupon') }}
                        </a>
                    </div>

                    <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="border p-2">{{ __('Code') }}</th>
                                <th class="border p-2">{{ __('Discount %') }}</th>
                                <th class="border p-2">{{ __('Valid From') }}</th>
                                <th class="border p-2">{{ __('Valid Until') }}</th>
                                <th class="border p-2">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td class="border p-2">{{ $coupon->code }}</td>
                                    <td class="border p-2">{{ $coupon->discount_percentage }}%</td>
                                    <td class="border p-2">{{ $coupon->valid_from }}</td>
                                    <td class="border p-2">{{ $coupon->valid_until }}</td>
                                    <td class="border p-2">
                                        <a href="{{ route('coupons.edit', $coupon->id) }}" class="text-blue-500 mr-2">
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500" onclick="return confirm('{{ __('Are you sure?') }}')">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $coupons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
