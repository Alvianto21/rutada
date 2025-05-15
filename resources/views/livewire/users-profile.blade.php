<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
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
    
        </div>
    </div>
</section>
