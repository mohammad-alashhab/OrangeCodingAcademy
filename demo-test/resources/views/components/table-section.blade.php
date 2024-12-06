<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
    <div class="bg-gray-100 dark:bg-gray-700 p-6 flex items-center justify-between">
        <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $title }}</h3>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-gray-500 dark:text-gray-400 border-b dark:border-gray-700">
                        {{ $slot }}
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <!-- Table Content -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>