<x-homes.layout>
    <livewire:api.index></livewire:api.index>

    <!--livewire assets -->
	@push('styles')
		@livewireStyles
	@endpush

	@push('scripts')
		@livewireScripts
	@endpush
</x-homes.layout>
