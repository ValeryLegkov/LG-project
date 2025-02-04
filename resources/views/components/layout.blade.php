<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
			integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />

		<script src="//unpkg.com/alpinejs" defer></script>
		<script src="https://cdn.tailwindcss.com"></script>
		<script>
			tailwind.config = {
				theme: {
					extend: {
						colors: {
							laravel: "#ef3b2d",
						},
					},
				},
			};
		</script>
		<title>LaraGigs | Find Laravel Jobs</title>
	</head>

	<body class="mb-48">

		<x-flash-message />

		<nav class="flex justify-between items-center mb-4 bg-white relative z-20 mr-4 md:text-xl">

			<a href="/">
				<img class="w-24" src="{{ asset('images/logo.png') }}" alt="logo">
			</a>

			<input type="checkbox" id="menu-toggle" class="hidden peer">
			<label for="menu-toggle" class="block md:hidden text-2xl cursor-pointer">
				<i class="fa-solid fa-bars"></i>
			</label>

			<ul
				class="hidden peer-checked:flex md:flex flex-col md:flex-row absolute md:relative top-16 md:top-0 left-0 w-full md:w-auto bg-red-50 md:bg-transparent items-center space-y-4 md:space-y-0 md:space-x-6 p-4 md:p-0 border md:border-none rounded-md">
				@auth
					<li class=" border-b-2 md:border-red-200 ">
						<span class="font-bold uppercase text-red-400 block md:inline">Welcome {{ auth()->user()->name }}
						</span>
					</li>
					<li>
						<a href="{{ route('listings.manage') }}" class="hover:text-laravel"><i class="fa-solid fa-gear mr-1">
							</i>Manage
							Listings</a>
					</li>
					<li>
						<form class="inline" method="POST" action="{{ route('logout') }}">
							@csrf
							<button type="submit" class="hover:text-laravel"><i class="fa-solid fa-sign-out-alt"></i> Logout</button>
						</form>
					</li>
				@endauth

				@guest
					<li>
						<a href="{{ route('register') }}" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
					</li>
					<li>
						<a href="{{ route('login') }}" class="hover:text-laravel"><i
								class="fa-solid fa-arrow-right-to-bracket mr-1"></i>Login</a>
					</li>
				@endguest
			</ul>
		</nav>

		{{-- {{ VIEW OUTPUT }} --}}
		<main>
			{{ $slot }}
		</main>

		<footer
			class="fixed bottom-0 left-0 w-full bg-laravel text-white font-bold h-24 opacity-90 px-6 md:px-12 flex items-center">

			<div class="flex-1 flex justify-start mr-2">
				<p class="text-sm sm:text-base text-balance">Copyright &copy; All Rights Reserved</p>
			</div>

			<div class="flex h-full items-center">
				<a href="/listings/create"
					class="bg-black text-white text-base md:text-xl h-[90%] px-6 md:px-10 md:py-3 flex items-center justify-center hover:bg-yellow-400 w-full sm:w-auto">
					Post Job
				</a>
			</div>
		</footer>
	</body>

</html>
