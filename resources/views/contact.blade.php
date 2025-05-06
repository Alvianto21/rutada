<x-homes.layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	<div class="bg-white py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Web Admin Info -->
                <div class="p-6 bg-gray-100 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-gray-800">Web Admin</h3>
                    <p class="mt-2 text-gray-600">If you have any issues with the website, feel free to contact our web admin.</p>
                    <ul class="mt-4 space-y-2">
                        <li><strong>Name:</strong> John Doe</li>
                        <li><strong>Email:</strong> <a href="mailto:webadmin@example.com" class="text-blue-600 hover:underline">webadmin@example.com</a></li>
                        <li><strong>Phone:</strong> +1 234 567 890</li>
                    </ul>
                </div>

                <!-- User Admin Info -->
                <div class="p-6 bg-gray-100 rounded-lg shadow">
                    <h3 class="text-xl font-semibold text-gray-800">User Admin</h3>
                    <p class="mt-2 text-gray-600">For user-related inquiries, please reach out to our user admin.</p>
                    <ul class="mt-4 space-y-2">
                        <li><strong>Name:</strong> Jane Smith</li>
                        <li><strong>Email:</strong> <a href="mailto:useradmin@example.com" class="text-blue-600 hover:underline">useradmin@example.com</a></li>
                        <li><strong>Phone:</strong> +1 987 654 321</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <!-- alpine js -->
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush
</x-homes.layout>