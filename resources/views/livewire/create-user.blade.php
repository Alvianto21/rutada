<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add New User</h2>
        <form enctype="multipart/form-data" wire:submit.prevent="createUser">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <x-forms.create-user label="Your NIK" name="nik" type="tel" id="nik" placeholder="Your NIK" wire:model="nik">Your NIK</x-forms.create-user>
                </div>
                <div class="sm:col-span-2">
                    <x-forms.create-user label="Your Name" name="name" type="text" id="name" placeholder="Your name" wire:model="name">Your Name</x-forms.create-user>
                </div>
                <div class="w-full">
                    <x-forms.create-user label="Your Email" name="email" type="email" id="email" placeholder="Your Email" wire:model.live="email">Your Email</x-forms.create-user>
                </div>
                <div class="w-full">
                    <x-forms.create-user label="Your Username" name="username" type="text" id="username" placeholder="Your Username" wire:model="username">Your Username</x-forms.create-user>
                </div>
                <div class="w-full">
                    <x-forms.create-user label="Place of Birth" name="place_of_birth" type="text" id="place_of_birth" placeholder="Place of Birth" wire:model="place_of_birth">Place of Birth</x-forms.create-user>
                </div>
                <div class="w-full">
                    <x-forms.create-user label="Date of birth" name="date_of_birth" type="date" id="date_of_birth" placeholder="Date of birth" wire:model.live="date_of_birth">Date of birth</x-forms.create-user>
                </div>
                <div class="sm:col-span-2">
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <textarea id="address" name="address" value="{{ old('address') }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your Address" required wire:model="address"></textarea>
                </div>
                <div>
                    <x-forms.create-user label="Phone Number" name="phone" type="tel" id="phone" placeholder="Phone Number" wire:model.live="phone">Phone Number</x-forms.create-user>
                </div>
                <div>
                    <x-forms.create-user label="Your Job" name="job" type="text" id="job" placeholder="Your Job" wire:model="job">Your Job</x-forms.create-user>
                </div>
                <div>
                    <x-forms.select-create-user label="Gender" name="gender" id="gender" :options="['Male' => 'Male', 'Female' => 'Female']" wire:model="gender">Gender</x-forms.select-create-user>
                </div>
                <div>
                    <x-forms.select-create-user label="Religion" name="religion" id="religion" :options="['Islam' => 'Islam', 'Kristen' => 'Kristen', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Other' => 'Other']" wire:model="religion">Religion</x-forms.select-create-user>
                </div>
                <div>
                    <x-forms.select-create-user label="Marital Status" name="marital_status" id="marital_status" :options="['Single' => 'Single', 'Married' => 'Married']" wire:model="marital_status">Marital Status</x-forms.select-create-user>
                </div>
                <div>
                    <x-forms.select-create-user label="Blood Type" name="blood_type" id="blood_type" :options="['A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O']" wire:model="blood_type">Blood Type</x-forms.select-create-user>
                </div> 
            </div>
            <div class="mb-3 mt-4">
                <div wire:loading wire:target="photo">Uploading...</div>    
                @if ($photo)
                    Photo Preview:
                    <img src="{{ $photo->temporaryUrl() }}">
                @endif
                <x-forms.photo-create-user label="Upload Photo" name="photo" type="file" id="photo" wire:model="photo">Upload Photo</x-forms.photo-create-user>
            </div>
            <div class="mt-4 w-full">
                <x-forms.create-user label="Password" name="password" type="password" id="password" placeholder="Your password" wire:model="password">Password</x-forms.create-user>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Add User
            </button>
        </form>
    </div>
  </section>