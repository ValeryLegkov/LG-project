@if (session()->has('message'))
	<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)"
		class="fixed ml-2 z-30 top-0 left-1/2 transform -translate-x-1/2 px-3 py-2 md:px-10 md:py-4 bg-green-500 text-sm md:text-lg text-white text-center font-semibold uppercase rounded-b-md"
		x-show="show">
		{{ session('message') }}
	</div>
@endif
