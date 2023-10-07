<div wire:poll.keep-alive.2s class="py-6">

	<div wire:offline>
		<div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
			<svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
				<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
			</svg>
			<span class="sr-only">Info</span>
			<div>
				<span class="font-medium">Warning alert!</span> Make sure your device connect to internet connection.
			</div>
		</div>
	</div>
	
	<div class="relative overflow-x-auto sm:rounded-lg">

		<h1 class="text-2xl font-bold text-blue-700 py-3 w-full"> Users List </h1>

		<div class="relative w-full shadow pb-3">
			<input wire:model.live.debounce.50s="search" wire:offline.attr="disabled" type="text" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search here ....">
			<span class="absolute inset-y-0 right-0 flex items-center pr-4 pb-2.5">
				<svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
					<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
				</svg>
			</span>
		</div>

		<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 py-3 px-3">
			<thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
				<tr class="bg-gray-300 text-lg">
					<th scope="col" class="border border-2 px-6 py-2"> Name </th>
					<th scope="col" class="border border-2 px-6 py-2"> Email </th>
					<th scope="col" class="border border-2 px-6 py-2"> Action </th>
				</tr>
			</thead>
			<tbody>
				@if ( (!empty($users)) AND !$users->isEmpty() )
					@foreach ($users as $user)
						<tr wire:key="{{ $user->id }}" class="bg-white text-lg">
							<th scope="row" class="border border-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
								{{ $user->name }}
							</th>
							<td class="border border-2 px-6 py-4 text-gray-900">
								{{ $user->email }}
							</td>
							<td class="border border-2 px-6 py-4 text-center">
								<button wire:click="viewUser({{ $user }})" wire:offline.attr="disabled" type="button" class="text-base px-3 py-1.5 font-medium text-white bg-blue-500 hover:bg-blue-700 border rounded-full">
									Edit
								</button>
							</td>
						</tr>
					@endforeach
				@endif
			</tbody>
		</table>

		<div wire:offline.remove class="w-full shadow pt-3">
			{{ $users->links() }}
		</div>

		@if ($selectedUser)
			<x-modal name="user-details" title="View User">
				<x-slot:body>
					Name: {{ $selectedUser->name }}
					<br>
					Email: {{ $selectedUser->email }}
				</x-slot:body>
			</x-modal>
		@endif

	</div>

</div>
