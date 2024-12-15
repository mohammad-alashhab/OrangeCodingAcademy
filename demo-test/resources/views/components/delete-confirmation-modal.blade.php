<!-- Delete Confirmation Modal -->
<div
    x-data="{ isOpen: false, productId: null }"
    x-on:open-delete-modal.window="isOpen = true; productId = $event.detail"
    x-show="isOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="fixed inset-0 z-50 flex items-center justify-center overflow-x-hidden overflow-y-auto bg-black bg-opacity-50"
    role="dialog"
    aria-modal="true"
    aria-labelledby="delete-modal-title">

    <!-- Modal Content -->
    <div
        x-show="isOpen"
        @click.away="isOpen = false"
        class="relative w-full max-w-md p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">

        <!-- Close Button -->
        <button
            @click="isOpen = false"
            class="absolute top-2 right-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Modal Header -->
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <h3 id="delete-modal-title" class="text-2xl font-semibold text-gray-800 dark:text-white">
                Are you sure you want to delete this product?
            </h3>
        </div>

        <!-- Modal Body -->
        <p class="text-gray-600 dark:text-gray-300 mb-6">
            Deleting this product is permanent and cannot be undone. Please confirm if you wish to proceed.
        </p>

        <!-- Action Buttons -->
        <div class="flex justify-between space-x-4">
            <!-- Cancel Button -->
            <button
                @click="isOpen = false"
                class="w-full py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 transition-colors duration-200">
                Cancel
            </button>

            <!-- Delete Form -->
            <form
                x-bind:action="'/products/' + productId"
                method="POST"
                class="w-full"
                x-show="productId"
                x-transition>
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="w-full py-2 text-white bg-red-600 rounded-lg hover:bg-red-700 transition-colors duration-200">
                    Delete Product
                </button>
            </form>
        </div>
    </div>
</div>