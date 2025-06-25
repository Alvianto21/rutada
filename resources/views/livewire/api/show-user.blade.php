<section class="bg-white dark:bg-gray-900">
    <div class="grid items-center py-8 px-4 mx-auto justify-items-start max-w-screen-xl lg:grid lg:py-16 lg:px-6">
        <div class="text-gray-800 space-x-6 sm:text-center dark:text-white">
            <label class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">User Profile</label>
            <div class="justify-items-center text-center py-4">
                <!-- Photo profile -->
                @if ($userData['photo'])
                    <image src="{{ asset('storage/' . $userData['photo']) }}" alt="{{ $userData['name'] }}"
                        class="object-scale-down justify-items-center text-center max-w-md rounded max-h-fit sm:max-w-sm">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ $userData['name'] }}&color=7F9CF5&background=EBF4FF"
                            alt="{{ $userData['name'] }}"
                            class="object-scale-down justify-items-center text-center max-w-md rounded max-h-fit sm:max-w-sm py-3">
                @endif
            </div>
            <div class="grid grid-cols-6 grid-rows-2 gap-2">
                <!-- NIK -->
                <x-forms.read-profile label="NIK" for="nik" type="number" name="nik" id="nik"
                    value="{{ $userData['nik'] }}">NIK</x-forms.read-profile>
                <!-- name -->
                <x-forms.read-profile label="Name" for="name" type="text" name="name" id="name"
                    value="{{ $userData['name'] }}">Name</x-forms.read-profile>
                <!-- username -->
                <x-forms.read-profile label="Username" for="username" type="text" name="username" id="username"
                    value="{{ $userData['username'] }}">Username</x-forms.read-profile>
                <!-- email -->
                <x-forms.read-profile label="Email" for="email" type="email" name="email" id="email"
                    value="{{ $userData['email'] }}">Email</x-forms.read-profile>
                <!-- place of birth -->
                <x-forms.read-profile label="PLace of Birth" for="place_of_birth" type="text" name="place_of_birth"
                    id="place_of_birth" value="{{ $userData['place_of_birth'] }}">Place of Birth</x-forms.read-profile>
                <!-- date of birth -->
                <x-forms.read-profile label="Date of Birth" for="date_of_birth" type="text" name="date_of_birth"
                    id="date_of_birth" value="{{ $userData['date_of_birth'] }}">Date of Birth</x-forms.read-profile>
                <!-- gender -->
                <x-forms.read-profile label="Gender" fof="gender" type="text" name="gender" id="gender"
                    value="{{ $userData['gender'] }}">Gender</x-forms.read-profile>
                <!-- address -->
                <x-forms.read-profile label="Address" for="address" type="text" name="address" id="address"
                    value="{{ $userData['address'] }}">Address</x-forms.read-profile>
                <!-- religion -->
                <x-forms.read-profile label="Religion" for="religion" type="text" name="religion" id="religion"
                    value="{{ $userData['religion'] }}">Religion</x-forms.read-profile>
                <!-- marital status -->
                <x-forms.read-profile label="Marital Status" for="marital_status" type="text" name="marital_status"
                    id="marital_status" value="{{ $userData['marital_status'] }}">Marital Status</x-forms.read-profile>
                <!-- job -->
                <x-forms.read-profile label="Job" for="job" type="text" name="job" id="job"
                    value="{{ $userData['job'] }}">Job</x-forms.read-profile>
                <!-- phone -->
                <x-forms.read-profile label="Phone" for="phone" type="tel" name="phone" id="phone"
                    value="{{ $userData['phone'] }}">Phone</x-forms.read-profile>
                <!-- blood type -->
                <x-forms.read-profile label="Blood Type" for="blood_type" type="text" name="blood_type"
                    id="blood_type" value="{{ $userData['blood_type'] }}">Blood Type</x-forms.read-profile>
            </div>
        </div>
    </div>
    <!-- back button -->
    <div class="grid items-center py-8 px-4 justify-items-center max-w-screen-xl lg:grid lg:py-16 lg:px-6">
        <div class="text-gray-800 space-x-6 sm:text-center dark:text-white">
            <a href="{{ route('user.index') }}" type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Back</a>
        </div>
    </div>
</section>
