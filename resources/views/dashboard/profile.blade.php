<x-homes.layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	<section class="bg-white dark:bg-gray-900">
		<div class="grid items-center py-8 px-4 mx-auto justify-items-start max-w-screen-xl lg:grid lg:py-16 lg:px-6">
			<div class="text-gray-800 space-x-6 sm:text-center dark:text-white">
				<label class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Your Profile</label>
				<div class="justify-items-center text-center py-4">
					@if ($user->photo)
						<image src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" class="object-scale-down justify-items-center text-center max-w-md rounded max-h-fit sm:max-w-sm">
					@else
						<img src="https://ui-avatars.com/api/?name={{ $user->name }}&color=7F9CF5&background=EBF4FF" alt="{{ $user->name }}" class="object-scale-down justify-items-center text-center max-w-md rounded max-h-fit sm:max-w-sm py-3">
					@endif
				</div>
				<div class="grid grid-cols-6 grid-rows-2 gap-2">
					<!-- NIK -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="NIK" for="nik">NIK</label>
					<input type="number" class="text-md text-center font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="nik" id="nik" value="{{ $user->nik}}" readonly aria-readonly="true">
					<!-- Name -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="Name" for="name">Name</label>
					<input type="text" class="text-md text-center font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="name" id="name" value="{{ $user->name }}" readonly aria-readonly="true">
					<!-- place of birth -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="Place of Birth" for="place_of_birth">Place Of Birth</label>
					<input type="text" class="text-md text-center font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="place_of_birth" id="place_of_birth" value="{{ $user->place_of_birth }}" readonly aria-readonly="true">
					<!-- date of birth -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="Date of birth" for="date_of_birth">Date Of Birth</label>
					<input type="text" class="text-md text-center font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="date_of_birth" id="date_of_birth" value="{{ $user->date_of_birth_formatted }}" readonly aria-readonly="true">
					<!-- gender -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="Gender" for="gender">Gender</label>
					<input type="text" class="text-md text-center font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="gender" id="gender" value="{{ $user->gender }}" readonly aria-readonly="true">
					<!-- address -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="Address" for="address">Address</label>
					<input type="text" class="text-md overflow-x-auto font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="address" id="address" value="{{ $user->address }}" readonly aria-readonly="true">
					<!-- religion -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="Religion" for="religion">Religion</label>
					<input type="text" class="text-md text-center font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="religion" id="religion" value="{{ $user->religion }}" readonly aria-readonly="true">
					<!-- marital status -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="Marital Status" for="marital_status">Marital Status</label>
					<input type="text" class="text-md text-center font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="marital_status" id="marital_status" value="{{ $user->marital_status }}" readonly aria-readonly="true">
					<!-- job -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="Job" for="job">Job</label>
					<input type="text" class="text-md text-center font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="job" id="job" value="{{ $user->job }}" readonly aria-readonly="true">
					<!-- email -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="Email" for="email">Email</label>
					<input type="email" class="text-md text-center font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="email" id="email" value="{{ $user->email }}" readonly aria-readonly="true">
					<!-- phone -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="Phone" for="phone">Phone</label>
					<input type="tel" class="text-md text-center font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="phone" id="phone" value="{{ $user->phone }}" readonly aria-readonly="true">
					<!-- blood type -->
					<label class="text-lg font-semibold text-gray-900 dark:text-white" aria-label="Blood Type" for="blood_type">Blood Type</label>
					<input type="text" class="text-md text-center font-medium text-black-900 dark:text-white focus:outline-sky-500 focus:ring-1" name="blood_type" id="blood_type" value="{{ $user->blood_type }}" readonly aria-readonly="true">
				</div>
		</div>
	</section>
</x-homes.layout>