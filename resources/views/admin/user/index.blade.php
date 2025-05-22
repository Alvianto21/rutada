<x-homes.layout>
	
	<livewire:users-profile></livewire:users-profile>

	<!--livewire assets -->
	@push('styles')
		@livewireStyles
	@endpush

	@push('scripts')
		@livewireScripts
	@endpush
		
</x-homes.layout>