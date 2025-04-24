    <nav class="bg-gray-800" x-data="{ isOpen: false }">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            {{-- <div class="shrink-0">
              <img class="size-8" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div> --}}
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-homes.navlink href="/" :active="request()->is('/')">Home</x-homes.navlink>
                <x-homes.navlink href="/contact" :active="request()->is('contact')">Contact</x-homes.navlink>
              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">  
              <!-- Profile dropdown -->
              <div class="relative ml-3">
                <div>
                  <button type="button" @click="isOpen = !isOpen" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    <img class="size-8 rounded-full" src="img/guest_user_profile.jpg" alt="Image by studiogstock on Freepik, businessman-character-avatar-isolated">
                  </button>
                </div>
  
                <div x-show="isOpen"
                x-transition:enter="transition ease-out duration-100 transform"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75 transform"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100 outline-hidden", Not Active: "" -->
                @auth                   
                <x-Homes.navlink-user href="#" :active="request()->is('#')" id="user-menu-item-0">Your Profile</x-Homes.navlink-user>
                <x-Homes.navlink-user href="#" :active="request()->is('#')" id="user-menu-item-0">Settings</x-Homes.navlink-user>
                <x-Homes.navlink-user href="#" :active="request()->is('#')" id="user-menu-item-0">Sign out</x-Homes.navlink-user>
                @endauth

                @guest
                    <x-Homes.navlink-user href="/login" :active="request()->is('#')" id="user-menu-item-0">Login</x-Homes.navlink-user>
                @endguest
                </div>
              </div>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden" aria-controls="mobile-menu" aria-expanded="false">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <!-- Menu open: "hidden", Menu closed: "block" -->
              <i :class="{'hidden': isOpen, 'block': !isOpen }" class="fa-bars text-xl"></i>
              <!-- Menu open: "block", Menu closed: "hidden" -->
              <i :class="{'block': isOpen, 'hidden': !isOpen }" class="fa-times text-xl"></i>
            </button>
          </div>
        </div>
      </div>
  
      <!-- Mobile menu, show/hide based on menu state. -->
      <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <x-homes.navlink href="/" :active="request()->is('/')">Home</x-homes.navlink>
          <x-homes.navlink href="/contact" :active="request()->is('contact')">Contact</x-homes.navlink>
        </div>
        <div class="border-t border-gray-700 pt-4 pb-3">
          <div class="flex items-center px-5">
            <div class="shrink-0">
              <img class="size-10 rounded-full" src="img/guest_user_profile.jpg" alt="Image by studiogstock on Freepik, businessman-character-avatar-isolated">
            </div>
            <div class="ml-3">
              <div class="text-base/5 font-medium text-white">Guest User</div>
              <div class="text-sm font-medium text-gray-400">email@example.com</div>
            </div>
          </div>
          <div class="mt-3 space-y-1 px-2">
            @auth               
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
            @endauth

            @guest
            <a href="/login" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Login</a>
            @endguest
          </div>
        </div>
      </div>
    </nav>
