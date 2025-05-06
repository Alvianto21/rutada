<x-homes.layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	<p class="text-xl font-medium text-black">Welcome, {{ Auth::user()->name }}</p>

	@push('scripts')
        <!-- alpine js -->
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush
</x-homes.layout>