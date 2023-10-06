<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

		<!-- Tailwind CSS -->
		<!-- We are using FlowBite : Open-source library of interactive UI components built with the utility classes from Tailwind CSS.
		<script src="https://cdn.tailwindcss.com"></script>
		-->

		<!-- FlowBite Styles -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

       	@livewireStyles  

    </head>

    <body class="bg-gray-100 py-3 px-3">
		<div class="flex items-center justify-center">
			<livewire:user-list />
		</div>
        
		<!-- FlowBite Styles -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

		@livewireScripts 

    </body>
</html>
