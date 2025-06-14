<x-homes.layout>

	<x-slot:title>{{ $title }}</x-slot:title>

	<x-auth-session-status class="mb-4" :status="session('status')" />

	<section class="bg-gray-50 dark:bg-gray-900">
  		<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      		<div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
          		<h2 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
              		Request Change Password
          		</h2>
				<p class="mb-4 text-sm font-normal text-gray-500 dark:text-gray-400">
			  		Enter your email address and we will send you a link to reset your password.
				</p>
          		<form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="{{ route('password.request') }}" method="POST">
					@csrf
              		<div>
                  		<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                  		<input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@example.com" required autofocus value="{{ old('email') }}" @error('email') is-invalid @enderror>
						@error('email')
							<div class="text-sm text-red-600 dark:text-red-500 mt-2">
								{{ $message }}
							</div>
						@enderror
              		</div>
              		<button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Reset passwod</button>
          		</form>
				<p class="m-4 text-sm font-normal text-center text-gray-500 dark:text-gray-400">
					Remember your password? 
					<a href="{{ route('login') }}" type="button" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login</a>
				</p>
      		</div>
  		</div>
	</section>

	@push('scripts')
    <!-- alpine js -->
     <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush

</x-homes.layout>