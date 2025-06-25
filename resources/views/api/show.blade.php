<x-homes.layout>

	<livewire:api.show-user></livewire:api.show-user>

	<!--livewire assets -->
	@push('styles')
		@livewireStyles
	@endpush

	@push('scripts')
		@livewireScripts
	@endpush
</x-homes.layout>