<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-4 py-3">#</th>
            <th scope="col" class="px-4 py-3">NIK</th>
            <th scope="col" class="px-4 py-3">Name</th>
            <th scope="col" class="px-4 py-3">Email</th>
            <th scope="col" class="px-4 py-3">Username</th>
            <th scope="col" class="px-4 py-3">Place of Birth</th>
            <th scope="col" class="px-4 py-3">Date of birth</th>
            <th scope="col" class="px-4 py-3">Address</th>
            <th scope="col" class="px-4 py-3">Gender</th>
            <th scope="col" class="px-4 py-3">Phone</th>
            <th scope="col" class="px-4 py-3">JOB</th>
            <th scope="col" class="px-4 py-3">Religion</th>
            <th scope="col" class="px-4 py-3">Marital Status</th>
            <th scope="col" class="px-4 py-3">Blood Type</th>
            <th scope="col" class="px-4 py-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pagination as $user)
            <tr class="border-b dark:border-gray-700">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-4 py-3">{{ $user['nik'] }}</td>
                <td class="px-4 py-3">{{ $user['name'] }}</td>
                <td class="px-4 py-3">{{ $user['email'] }}</td>
                <td class="px-4 py-3">{{ $user['username'] }}</td>
                <td class="px-4 py-3">{{ $user['place_of_birth'] }}</td>
                <td class="px-4 py-7">{{ \Carbon\Carbon::parse($user['date_of_birth'])->format('d-m-Y') }}</td>
                <td class="px-4 py-3">{{ $user['address'] }}</td>
                <td class="px-4 py-3">{{ $user['gender'] }}</td>
                <td class="px-4 py-3">{{ $user['phone'] }}</td>
                <td class="px-4 py-3">{{ $user['job'] }}</td>
                <td class="px-4 py-3">{{ $user['religion'] }}</td>
                <td class="px-4 py-3">{{ $user['marital_status'] }}</td>
                <td class="px-4 py-3">{{ $user['blood_type'] }}</td>
                <td class="px-4 py-3 flex items-center justify-end" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                        type="button">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                    </button>
                    <div x-show="open" @click.outside="open = false"
                        class="z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="apple-imac-27-dropdown-button">
                            <li>
                                <a href="{{ route('user.show', ['user' => $user['id']]) }}"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                            </li>
                            <li>
                                <a href="{{ route('user.edit', ['user' => $user['id']]) }}"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <button
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" wire:click="deleteUser('{{ $user['id'] }}')" wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE">Delete</button>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
