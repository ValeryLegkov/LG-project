<x-layout>
	<x-home-button />
	<x-card class="rounded max-w-lg mx-auto mt-24">

		<header class="text-center">
			<h2 class="text-2xl  text-red-400 tracking-wider font-bold uppercase mb-1">
				Log In
			</h2>
			<p class="mb-4">Log in to post <span class="font-bold text-laravel">gigs</span></p>
		</header>

		<form method="POST" action="/users/authenticate">
			@csrf

			<div class="mb-6">
				<label for="email" class="inline-block text-lg mb-2">Email</label>
				<input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
					value="{{ old('email') }}" />

				@error('email')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-6">
				<label for="password" class="inline-block text-lg mb-2">
					Password
				</label>
				<input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />

				@error('password')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror
			</div>

			<div class="mb-6">
				<button type="submit"
					class=" uppercase bg-laravel tracking-widest text-white rounded py-2 px-4 hover:bg-black w-full">
					sign in
				</button>
			</div>

			<div class="mt-8">
				<p>
					Don't have an account?
					<a href="/register" class="text-laravel hover:underline">Register</a>
				</p>
			</div>
		</form>
	</x-card>
</x-layout>
