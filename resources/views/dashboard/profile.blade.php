<x-homes.layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	<section class="bg-white dark:bg-gray-900">
		<div class="grid items-center py-8 px-4 mx-auto justify-items-start max-w-screen-xl lg:grid lg:py-16 lg:px-6">
			<div class="text-gray-800 space-x-6 sm:text-center dark:text-white">
				<label class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Your Profile</label>
				<div class="justify-items-center text-center py-4">
					<!-- Photo profile -->
					@if ($user->photo)
						<image src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" class="object-scale-down justify-items-center text-center max-w-md rounded max-h-fit sm:max-w-sm">
					@else
						<img src="https://ui-avatars.com/api/?name={{ $user->name }}&color=7F9CF5&background=EBF4FF" alt="{{ $user->name }}" class="object-scale-down justify-items-center text-center max-w-md rounded max-h-fit sm:max-w-sm py-3">
					@endif
				</div>
				<div class="grid grid-cols-6 grid-rows-2 gap-2">
					<!-- NIK -->
					<x-forms.read-profile label="NIK" for="nik" type="number" name="nik" id="nik" value="{{ $user->nik }}">NIK</x-forms.read-profile>
					<!-- name -->
					<x-forms.read-profile label="Name" for="name" type="text" name="name" id="name" value="{{ $user->name }}">Name</x-forms.read-profile>
					<!-- username -->
					<x-forms.read-profile label="Username" for="username" type="text" name="username" id="username" value="{{ $user->username }}">Username</x-forms.read-profile>
					<!-- email -->
					<x-forms.read-profile label="Email" for="email" type="email" name="email" id="email" value="{{ $user->email }}">Email</x-forms.read-profile>
					<!-- place of birth -->
					<x-forms.read-profile label="PLace of Birth" for="place_of_birth" type="text" name="place_of_birth" id="place_of_birth" value="{{ $user->place_of_birth }}">Place of Birth</x-forms.read-profile>
					<!-- date of birth -->
					<x-forms.read-profile label="Date of Birth" for="date_of_birth" type="text" name="date_of_birth" id="date_of_birth" value="{{ $user->date_of_birth }}">Date of Birth</x-forms.read-profile>
					<!-- gender -->
					<x-forms.read-profile label="Gender" fof="gender" type="text" name="gender" id="gender" value="{{ $user->gender }}">Gender</x-forms.read-profile>
					<!-- address -->
					<x-forms.read-profile label="Address" for="address" type="text" name="address" id="address" value="{{ $user->address }}">Address</x-forms.read-profile>
					<!-- religion -->
					<x-forms.read-profile label="Religion" for="religion" type="text" name="religion" id="religion" value="{{ $user->religion }}">Religion</x-forms.read-profile>
					<!-- marital status -->
					<x-forms.read-profile label="Marital Status" for="marital_status" type="text" name="marital_status" id="marital_status" value="{{ $user->marital_status }}">Marital Status</x-forms.read-profile>
					<!-- job -->
					<x-forms.read-profile label="Job" for="job" type="text" name="job" id="job" value="{{ $user->job }}">Job</x-forms.read-profile>
					<!-- phone -->
					<x-forms.read-profile label="Phone" for="phone" type="tel" name="phone" id="phone" value="{{ $user->phone }}">Phone</x-forms.read-profile>
					<!-- blood type -->
					<x-forms.read-profile label="Blood Type" for="blood_type" type="text" name="blood_type" id="blood_type" value="{{ $user->blood_type }}">Blood Type</x-forms.read-profile>
				</div>
			</div>
		</div>
	</section>

	@push('scripts')
        <!-- alpine js -->
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush
</x-homes.layout>