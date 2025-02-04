<x-layout>

	<x-card class="max-w-xl mx-1 sm:mx-auto mt-10 md:mt-24">
		<header class="text-center">
			<h2 class="text-2xl font-bold uppercase mb-4 text-red-400 tracking-wider">
				Edit a Gig
			</h2>
			<p class="mb-4"><span class="font-semibold text-laravel">Edit:</span> {{ $listing->title }}</p>
		</header>

		<form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="mb-6">
				<label for="company" class="inline-block text-lg mb-2 font-medium">Company Name</label>
				<input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
					value="{{ $listing->company }}" />

				@error('company')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-6">
				<label for="title" class="inline-block text-lg mb-2 font-medium">Job Title</label>
				<input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
					placeholder="Example: Senior Laravel Developer" value="{{ $listing->title }}" />

				@error('title')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-6">
				<label for="location" class="inline-block text-lg mb-2 font-medium">Job Location</label>
				<input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
					placeholder="Example: Remote, Boston MA, etc" value="{{ $listing->location }}" />

				@error('location')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-6">
				<label for="email" class="inline-block text-lg mb-2 font-medium">Contact Email</label>
				<input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
					value="{{ $listing->email }}" />

				@error('email')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-6">
				<label for="website" class="inline-block text-lg mb-2 font-medium">
					Website/Application URL
				</label>
				<input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
					value="{{ $listing->website }}" />

				@error('website')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-6">
				<label for="tags" class="inline-block text-lg mb-2 font-medium">
					Tags (Comma Separated)
				</label>
				<input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
					placeholder="Example: Laravel, Backend, Postgres, etc" value="{{ $listing->tags }}" />

				@error('tags')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-6">
				<label for="logo" class="inline-block text-lg mb-2 font-medium">
					Company Logo
				</label>
				<input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
				<img class="w-48 mr-6 mb-6"
					src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}" alt="logo" />


				@error('logo')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-6">
				<label for="description" class="inline-block text-lg mb-2 font-medium">
					Job Description
				</label>
				<textarea class="border border-gray-200 rounded p-2 w-full min-h-32 max-h-60" name="description" rows="10"
				 placeholder="Include tasks, requirements, salary, etc">{{ $listing->description }}</textarea>

				@error('description')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-6">
				<button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black tracking-wider">
					Update GIG
				</button>

				<a href="{{ back()->getTargetUrl() }}"
					class="text-black text-lg font-semibold ml-4 hover:text-laravel hover:underline"> Back
				</a>
			</div>
		</form>
	</x-card>
</x-layout>
