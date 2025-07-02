<x-homes.layout>+
	
	<livewire:api.edit-user></livewire:api.edit-user>

	<!--livewire assets -->
	@push('styles')
		@livewireStyles
	@endpush

	@push('scripts')
		@livewireScripts
	@endpush
</x-homes.layout>