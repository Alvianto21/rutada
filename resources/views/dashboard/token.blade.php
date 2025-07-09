<x-homes.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="flex items-center h-screen bg-gray-50 dark:bg-gray-900">
        <div class="w-full max-w-screen-xl px-4 mx-auto lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                    <div>
                        <h5 class="mr-3 font-semibold dark:text-white">Your API Token</h5>
                        <p class="text-gray-500 dark:text-gray-400">{{ $token }}</p>
                    </div>
					<a href="/profile" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back to profile</a>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <!-- alpine js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush
</x-homes.layout>
