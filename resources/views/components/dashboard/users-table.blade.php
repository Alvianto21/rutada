<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="user-table">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" wire:click="sort('id')">
                    <div class="flex items-center">
                        #
                        <x-symbol.table-sort></x-symbol.table-sort>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        NIK
                    </div>
                </th>
                <th scope="col" class="px-6 py-3" wire:click="sort('name')">
                    <div class="flex items-center">
                        Name
                        <x-symbol.table-sort></x-symbol.table-sort>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Email
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Username
                    </div>
                </th>
                <th scope="col" class="px-6 py-3" wire:click="sort('place_of_birth')">
                    <div class="flex items-center">
                        PLace of Birth
                        <x-symbol.table-sort></x-symbol.table-sort>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Date of Birth
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Address
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Gender
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Phone
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Job
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Religion
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Marital Status
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Blood Type
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Actions
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)		
            <tr class="bg-white border-b hover:bg-gray-50 dark:hover:bg-gray-600 dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{ $user->nik }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->username }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->place_of_birth }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->date_of_birth_formatted }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->address }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->gender }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->phone }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->job }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->religion }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->marital_status }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->blood_type }}
                </td>
                <td class="px-4 py-3 flex items-center justify-end" x-data="{ open: false }">
                    <button @click="open = !open" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M6 12h.01m6 0h.01m5.99 0h.01"/>
                        </svg>      
                    </button>
                    <div x-show="open" @click.outside="open = false" class="z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <button class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click="loadUser('{{ $user->username }}')">Show</button>
                            </li>
                            <li>
                                <a href="users/{{ $user->username }}/edit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" >Edit</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" wire:click.prevent="deleteUser({{ $user->id }})">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>