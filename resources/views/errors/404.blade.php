<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="h-screen">
   <section class="flex items-center h-full p-16 dark:bg-gray-50 dark:text-gray-800">
	<div class="container flex flex-col h-[calc(100vh-80px)] items-center justify-center px-5 mx-auto my-8">
		<div class="max-w-md text-center">
			<h2 class="mb-8 font-extrabold text-5xl dark:text-gray-400">
				Error 404
			</h2>
			<p class="text-2xl font-semibold md:text-3xl text-primary">Кешіріңіз, біз бұл бетті таба алмадық.</p>
			<p class="mt-4 mb-8 dark:text-gray-600">Бірақ уайымдамаңыз, сіз біздің басты бетте көптеген басқа нәрселерді таба аласыз.</p>
			<x-button-primary><a rel="noopener noreferrer" href="/" class="">Негізгі бетке оралу</a></x-button-primary>
			
		</div>
	</div>
</section>
</body>

</html>