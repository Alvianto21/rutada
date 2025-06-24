<x-homes.layout>

	<livewire:api.create-user></livewire:api.create-user>

    <!--livewire assets -->
	@push('styles')
		@livewireStyles
	@endpush

	@push('scripts')
		@livewireScripts
	@endpush
</x-homes.layout>
