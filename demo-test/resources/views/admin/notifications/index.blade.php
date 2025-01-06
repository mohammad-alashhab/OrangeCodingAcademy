<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <h2 class="text-xl font-semibold">Notifications</h2>
        <ul class="space-y-2">
            @foreach ($notifications as $notification)
            <li class="flex justify-between items-center">
                <span>{{ $notification->content }}</span>
                @if (is_null($notification->read_at))
                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                    @csrf
                    <button class="text-blue-500">Mark as Read</button>
                </form>
                @else
                <span class="text-gray-500">Read</span>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</x-admin-app-layout>