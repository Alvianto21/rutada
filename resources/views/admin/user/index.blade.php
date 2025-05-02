<x-homes.layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	
	<livewire:users-profile></livewire:users-profile>
		
		@push('scripts')
			<!-- Costom Scripts -->
			<script src="{{ asset('js/table_users.js') }}"></script>
		@endpush
</x-homes.layout>