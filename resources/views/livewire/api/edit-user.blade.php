<section class="bg-white dark:bg-gray-900">
    <x-alert></x-alert>
    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update product</h2>
        <form action="" enctype="multipart/form-data" wire:submit.prevent="updateUser" method="post">
            @method('PUT')
            @csrf
            <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                <div class="sm:col-span-2">
                    <x-forms.update-user label="Your NIK" name="nik" type="tel" id="nik"
                        placeholder="Your NIK" wire:model.live="form.nik" user="{{ $userData['nik'] }}" ero="form.nik"
                        required>Your NIK</x-forms.update-user>
                </div>
                <div class="w-full">
                    <x-forms.update-user label="Your Name" name="name" type="text" id="name"
                        placeholder="Your name" wire:model="form.name" user="{{ $userData['name'] }}" ero="form.name"
                        required>Your Name</x-forms.update-user>
                </div>
                <div class="w-full">
                    <x-forms.update-user label="Your Email" name="email" type="email" id="email"
                        placeholder="Your Email" wire:model.live="form.email" user="{{ $userData['email'] }}"
                        ero="form.email" required>Your Email</x-forms.update-user>
                </div>
                <div>
                    <x-forms.update-user label="Your Username" name="username" type="text" id="username"
                        placeholder="Your Username" wire:model.live="form.username" user="{{ $userData['username'] }}"
                        ero="form.username" required>Your Username</x-forms.update-user>
                </div>
                <div>
                    <x-forms.update-user label="Place of Birth" name="place_of_birth" type="text" id="place_of_birth"
                        placeholder="Place of Birth" wire:model="form.place_of_birth"
                        user="{{ $userData['place_of_birth'] }}" ero="form.place_of_birth" required>PLace Of
                        Birth</x-forms.update-user>
                </div>
                <div>
                    <x-forms.update-user label="Date of birth" name="date_of_birth" type="date" id="date_of_birth"
                        placeholder="Date of birth" wire:model.live="form.date_of_birth"
                        user="{{ $userData['date_of_birth'] }}" ero="form.date_of_birth" required>Date Of
                        Birth</x-forms.update-user>
                </div>
                <div class="sm:col-span-2">
                    <label for="address"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <textarea id="address" name="address" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Your Address" wire:model="form.address" required>{{ old('form.address', $userData['address']) }}</textarea>
                </div>
                <div>
                    <x-forms.update-user label="Phone Number" name="phone" type="tel" id="phone"
                        placeholder="Phone Number" wire:model.live="form.phone" user="{{ $userData['phone'] }}"
                        ero="form.phone" required>Phone Number</x-forms.update-user>
                </div>
                <div>
                    <x-forms.update-user label="Your Job" name="job" type="text" id="job"
                        placeholder="Your Job" wire:model="form.job" user="{{ $userData['job'] }}" ero="form.job"
                        required>Your Job</x-forms.update-user>
                </div>
                <div>
                    <x-forms.select-update-user label="Gender" name="gender" id="gender" :options="['Male' => 'Male', 'Female' => 'Female']"
                        wire:model="form.gender" user="{{ $userData['gender'] }}"
                        ero="form.gender">Gender</x-forms.select-update-user>
                </div>
                <div>
                    <x-forms.select-update-user label="Religion" name="religion" id="religion" :options="[
                        'Islam' => 'Islam',
                        'Kristen' => 'Kristen',
                        'Katolik' => 'Katolik',
                        'Hindu' => 'Hindu',
                        'Buddha' => 'Buddha',
                        'Other' => 'Other',
                    ]"
                        wire:model="form.religion" user="{{ $userData['religion'] }}"
                        ero="form.religion">Religion</x-forms.select-update-user>
                </div>
                <div>
                    <x-forms.select-update-user label="Marital Status" name="marital_status" id="marital_status"
                        :options="['Single' => 'Single', 'Married' => 'Married']" wire:model="form.marital_status" user="{{ $userData['marital_status'] }}"
                        ero="form.marital_status">Marital Status</x-forms.select-update-user>
                </div>
                <div>
                    <x-forms.select-update-user label="Blood Type" name="blood_type" id="blood_type"
                        :options="['A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O']" wire:model="form.blood_type" user="{{ $userData['blood_type'] }}"
                        ero="form.blood_type">Blood Type</x-forms.select-update-user>
                </div>
                <div>
                    @if (
                        $form->photo instanceof \Illuminate\Http\UploadedFile &&
                            in_array($form->photo->getMimeType(), ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml']))
                        <div wire:loading wire:target="form.photo">Uploading...</div>
                        Photo Preview:
                        <img src="{{ $form->photo->temporaryUrl() }}" class="m-3">
                    @elseif($userData['photo'])
                        Photo Preview:
                        <img src="{{ asset('storage/' . $userData['photo']) }}" class="m-3">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ $userData['name'] }}&color=7F9CF5&background=EBF4FF"
                            alt="{{ $userData['name'] }}" class="mb-5">
                    @endif
                    <x-forms.photo-create-user label="Upload Photo" name="photo" type="file" id="photo"
                        wire:model="form.photo" ero="form.photo">Upload Photo</x-forms.photo-create-user>
                </div>
                <div class="sm:col-span-2">
                    <x-forms.password-update-user label="Password" name="password" type="password" id="password"
                        placeholder="Your password" wire:model="form.password"
                        ero="form.password">Password</x-forms.password-update-user>
                    <span>
                        <small class="text-gray-500">Left it blank if you don't want change the password</small>
                    </span>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <button type="submit"
                    class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    Update User
                    <div wire:loading>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M13.383 4.076a6.5 6.5 0 0 0-6.887 3.95A5 5 0 0 0 7 18h3v-4a2 2 0 0 1-1.414-3.414l2-2a2 2 0 0 1 2.828 0l2 2A2 2 0 0 1 14 14v4h4a4 4 0 0 0 .988-7.876 6.5 6.5 0 0 0-5.605-6.048Z" />
                            <path
                                d="M12.707 9.293a1 1 0 0 0-1.414 0l-2 2a1 1 0 1 0 1.414 1.414l.293-.293V19a1 1 0 1 0 2 0v-6.586l.293.293a1 1 0 0 0 1.414-1.414l-2-2Z" />
                        </svg>
                    </div>
                </button>
            </div>
        </form>
    </div>
</section>
