<x-homes.layout>
	<x-slot:title>{{ $title }}</x-slot:title>
	<p class="text-xl font-medium text-black">Welcome, {{ Auth::user()->name }}</p>
</x-homes.layout>