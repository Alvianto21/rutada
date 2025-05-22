<x-homes.layout>
	
	<livewire:edit-user :user="$user"></livewire:edit-user>

	<!--livewire assets -->
	@push('styles')
		@livewireStyles
	@endpush

	@push('scripts')
		@livewireScripts
	@endpush
		
</x-homes.layout>