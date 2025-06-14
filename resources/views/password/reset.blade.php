<x-homes.layout>

	<x-slot:title>{{ $title }}</x-slot:title>

	<section class="bg-gray-50 dark:bg-gray-900">
  		<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      		<div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
          		<h2 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
              		Confirm Change Password
          		</h2>
          		<form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="{{ route('password.store') }}" method="POST">
					@csrf
					<input type="hidden" name="token" value="{{ $request->route('token') }}">
              		<div>
                  		<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                  		<input type="email" value="{{ old('email', $request->email) }}" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@example.com" required @error('email') is-invalid @enderror>
						@error('email')
							<div class="text-sm text-red-600 dark:text-red-500 mt-2">
								{{ $message }}
							</div>
						@enderror
              		</div>
              		<div>
                  		<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                  		<input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required @error('password') is-invalid @enderror>
						@error('password')
							<div class="text-sm text-red-600 dark:text-red-500 mt-2">
								{{ $message }}
							</div>
						@enderror
              		</div>
              		<div>
                  		<label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                  		<input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required @error('password') is-invalid @enderror>
						@error('password')
							<div class="text-sm text-red-600 dark:text-red-500 mt-2">
								{{ $message }}
							</div>
						@enderror
              		</div>
              		<button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Reset passwod</button>
          		</form>
      		</div>
  		</div>
	</section>

	@push('scripts')
    <!-- alpine js -->
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush

</x-homes.layout>