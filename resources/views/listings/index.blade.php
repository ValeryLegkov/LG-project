<x-layout>
	@include('partials._hero')
	@include('partials._search')

	<x-flash-message />

	<div class="grid gap-4 mx-4 xl:grid-cols-2 xl:grid-auto-rows-fr">

		@unless (count($listings) == 0)
			@foreach ($listings as $listing)
				<x-listing-card :listing="$listing" />
			@endforeach
		@else
			<x-card class="items-center">
				<p class="text-red-500 font-semibold uppercase text-center tracking-wider">No listings found</p>
			</x-card>
		@endunless
	</div>

	{{-- Pagination --}}
	<div class="mt-6 p-4">{{ $listings->links() }}</div>
</x-layout>
