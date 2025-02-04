<x-layout>

	<x-home-button />

	<x-card class="mx-1 md:mx-2">
		<header class="text-center mb-4">
			<h1 class="text-xl md:text-3xl text-red-400 text-center font-bold my-4 uppercase">
				Manage Gigs
			</h1>
			<hr class="border-2 border-red-200">
		</header>

		@unless ($listings->isEmpty())
			@foreach ($listings->sortByDesc('created_at') as $listing)
				<table class="w-full table-fixed rounded-md">
					<tbody>
						<tr class="border-b border-gray-300">
							<td class="px-4 py-6 text-base md:text-xl lg:text-2xl truncate w-1/3">
								<a href="/listings/{{ $listing->id }}"
									class="inline-block truncate max-w-full hover:text-laravel hover:underline">
									{{ $listing->title }}
								</a>
							</td>

							<td class="px-4 py-6 text-sm md:text-lg text-center min-w-max">
								<a href="/listings/{{ $listing->id }}"
									class="inline-block truncate max-w-full hover:text-laravel hover:underline">
									{{ $listing->company }}
								</a>
							</td>

							<td class="px-2 py-6 text-sm md:text-lg text-center min-w-max">
								<div class="flex justify-end space-x-4 md:space-x-8">
									<a href="/listings/{{ $listing->id }}/edit"
										class="text-blue-400 hover:text-blue-600 px-2 py-1 rounded-xl flex items-center justify-center">
										<i class="fa-solid fa-pen-to-square text-base"></i>
										<span class="hidden sm:inline ml-1 whitespace-nowrap">Edit</span>
									</a>

									<form method="POST" action="/listings/{{ $listing->id }}">
										@csrf
										@method('DELETE')
										<button class="text-red-400 hover:text-red-600 px-2 py-1 flex items-center justify-center">
											<i class="fa-solid fa-trash text-base"></i>
											<span class="hidden sm:inline ml-1 whitespace-nowrap">Delete</span>
										</button>
									</form>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			@endforeach
		@else
			<tr class="border-gray-300">
				<td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
					<p class="text-center text-red-500 font-bold uppercase">No Listings Found</p>
				</td>
			</tr>
		@endunless
	</x-card>

</x-layout>
