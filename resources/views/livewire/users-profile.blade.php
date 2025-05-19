<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5" wire:key="users-profile-root">
    <x-alert></x-alert>
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <x-forms.search-users-table></x-forms.search-users-table>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <a type="button" href="users/create" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Users
                    </a>
                    <x-forms.filter-users-table id="gender" label="Gender" model="genderFilter" :options="['male' => 'Male', 'female' => 'Female']">Gender</x-forms.filter-users-table>
                    <x-forms.filter-users-table id="religion" label="Religion" model="religionFilter" :options="['islam' => 'Islam', 'kristen' => 'Kristen', 'katolik' => 'Katolik', 'hindu' => 'Hindu', 'buddha' => 'Buddha', 'other' => 'Other']">Religion</x-forms.filter-users-table>
                    <x-forms.filter-users-table id="marital_status" label="Marital Status" model="maritalStatusFilter" :options="['single' => 'Single', 'married' => 'Married']">Marital Status</x-forms.filter-users-table>
                    <x-forms.filter-users-table id="blood_type" label="Blood Type" model="bloodTypeFilter" :options="['A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O']">Bloot Type</x-forms.filter-users-table>
                </div>
            </div>

            <x-dashboard.users-table :users="$users"></x-dashboard.users-table>

            {{ $users->links() }}

            {{-- <pre>{{ var_dump($selectedUser) }}</pre> --}}
            @if($selectedUser)
                <div class="flex justify-center mb-6 mt-5" x-data="{ show: true }" x-show="show">
                    <div class="w-full max-w-md bg-white dark:bg-gray-700 rounded-lg shadow-lg p-6 border border-gray-200 dark:border-gray-600">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">User Detail</h3>
                            <button wire:click="$set('selectedUser', null)" @click="show = false" type="button" class="text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex flex-col items-center">
                            @if (!empty($selectedUser['photo']))
                                <img src="{{ asset('storage/'. $selectedUser['photo']) }}" alt="{{ $selectedUser['name'] }}" class="w-24 h-24 rounded-full mb-4 object-cover border">
                            @else
                                <img src="{{ $selectedUser['photo_url'] ?? asset('img/guest_user_profile.jpg') }}" alt="User Photo" class="w-24 h-24 rounded-full mb-4 object-cover border">
                            @endif
                            <div class="text-center">
                                <h4 class="text-xl font-bold text-gray-800 dark:text-white mb-1">{{ $selectedUser['name'] }}</h4>
                                <p class="text-gray-500 dark:text-gray-300 text-sm mb-2">{{ $selectedUser['email'] }}</p>
                                <p class="text-gray-600 dark:text-gray-200 text-sm">NIK: {{ $selectedUser['nik'] }}</p>
                                <p class="text-gray-600 dark:text-gray-200 text-sm">Username: {{ $selectedUser['username'] }}</p>
                                <p class="text-gray-600 dark:text-gray-200 text-sm">Gender: {{ $selectedUser['gender'] }}</p>
                                <p class="text-gray-600 dark:text-gray-200 text-sm">Place/Date of Birth: {{ $selectedUser['place_of_birth'] }}, {{ $selectedUser['date_of_birth_formatted'] }}</p>
                                <p class="text-gray-600 dark:text-gray-200 text-sm">Address: {{ $selectedUser['address'] }}</p>
                                <p class="text-gray-600 dark:text-gray-200 text-sm">Phone: {{ $selectedUser['phone'] }}</p>
                                <p class="text-gray-600 dark:text-gray-200 text-sm">Job: {{ $selectedUser['job'] }}</p>
                                <p class="text-gray-600 dark:text-gray-200 text-sm">Religion: {{ $selectedUser['religion'] }}</p>
                                <p class="text-gray-600 dark:text-gray-200 text-sm">Marital Status: {{ $selectedUser['marital_status'] }}</p>
                                <p class="text-gray-600 dark:text-gray-200 text-sm">Blood Type: {{ $selectedUser['blood_type'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
