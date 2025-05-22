<x-homes.layout>

	<livewire:create-user></livewire:create-user>

	<!--livewire assets -->
	@push('styles')
		@livewireStyles
	@endpush

	@push('scripts')
		@livewireScripts
	@endpush
	
</x-homes.layout>