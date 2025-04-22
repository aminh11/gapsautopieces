<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
	<h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
		Paiement
	</h1>
	<div class="grid grid-cols-12 gap-4">
		<div class="md:col-span-12 lg:col-span-8 col-span-12">
			<!-- Card -->
			<div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
				<!-- Adresse de livraison -->
				<div class="mb-6">
					<h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
						Adresse de livraison
					</h2>
					<div class="grid grid-cols-2 gap-4">
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="first_name">
								Prénom
							</label>
							<input wire:model='first_name'class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 
							dark:text-white dark:border-none @error('first_name') border-red-500 npm @enderror" id="first_name" type="text">
							</input>
							@error('first_name')
							<div class="text-red-500 text-sm">{{ $message }}</div>
							@enderror
						</div>
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="last_name">
								Nom de famille
							</label>
							<input wire:model='last_name'class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 
							dark:text-white dark:border-none @error('last_name') border-red-500 npm @enderror" id="last_name" type="text">
							</input>
							@error('last_name')
							<div class="text-red-500 text-sm">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="mt-4">
						<label class="block text-gray-700 dark:text-white mb-1" for="phone">
							Téléphone
						</label>
						<input wire:model='phone' class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 
						dark:text-white dark:border-none @error('phone') border-red-500 npm @enderror" id="phone" type="text">
						</input>
						@error('phone')
						<div class="text-red-500 text-sm">{{ $message }}</div>
						@enderror
					</div>
					<div class="mt-4">
						<label class="block text-gray-700 dark:text-white mb-1" for="address">
							Adresse
						</label>
						<input wire:model='street_address' class="w-full rounded-lg border py-2 px-3 
						dark:bg-gray-700 dark:text-white dark:border-none @error('street_address') border-red-500 npm @enderror" id="address" type="text">
						</input>
						@error('street_address')
						<div class="text-red-500 text-sm">{{ $message }}</div>
						@enderror
					</div>
					<div class="mt-4">
						<label class="block text-gray-700 dark:text-white mb-1" for="city">
							Ville
						</label>
						<input wire:model='city' class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 
						dark:text-white dark:border-none @error('city') border-red-500 npm @enderror" id="city" type="text">
						</input>
						@error('city')
						<div class="text-red-500 text-sm">{{ $message }}</div>
						@enderror
					</div>
					<div class="grid grid-cols-2 gap-4 mt-4">
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="state">
								État / Gouvernorat
							</label>
							<input wire:model='state' class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 
							dark:text-white dark:border-none @error('city') border-red-500 npm @enderror" id="state" type="text">
							</input>
							@error('state')
						<div class="text-red-500 text-sm">{{ $message }}</div>
						@enderror
						</div>
						<div>
							<label class="block text-gray-700 dark:text-white mb-1" for="zip">
								Code postal
							</label>
							<input wire:model='zip_code' class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 
							dark:text-white dark:border-none @error('zip_code') border-red-500 npm @enderror" id="zip" type="text">
							</input>
							@error('zip_code')
							<div class="text-red-500 text-sm">{{ $message }}</div>
							@enderror
						</div>
					</div>
				</div>
				<div class="text-lg font-semibold mb-4">
					Sélectionner le mode de paiement
				</div>
				<ul class="grid w-full gap-6 md:grid-cols-2">
					<li>
						<input wire:model='payment_method' class="hidden peer" id="hosting-small"  
						required="" type="radio" value="cod" />
						<label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border 
						border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 
						dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 
						hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" 
						for="hosting-small">
							<div class="block">
								<div class="w-full text-lg font-semibold">
									Paiement à la livraison
								</div>
							</div>
							<svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewbox="0 0 14 10" 
							xmlns="http://www.w3.org/2000/svg">
								<path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" 
								stroke-linejoin="round" stroke-width="2">
								</path>
							</svg>
						</label>
					</li>
					
				@error('payment_method')
				<div class="text-red-500 text-sm">{{ $message }}</div>
				@enderror
			</div>
			<!-- End Card -->
		</div>
		<div class="md:col-span-12 lg:col-span-4 col-span-12">
			<div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
				<div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
					RÉCAPITULATIF DE COMMANDE
				</div>
				<div class="flex justify-between mb-2 font-bold">
					<span>
						Sous-total
					</span>
					<span>
						{{ Number::currency($grand_total,'TND') }}
					</span>
				</div>
				<div class="flex justify-between mb-2 font-bold">
					<span>
						Taxes
					</span>
					<span>
						{{ Number::currency(0,'TND') }}
					</span>
				</div>
				<div class="flex justify-between mb-2 font-bold">
					<span>
						Frais de livraison
					</span>
					<span>
						{{ Number::currency(0,'TND') }}
					</span>
				</div>
				<hr class="bg-slate-400 my-4 h-1 rounded">
				<div class="flex justify-between mb-2 font-bold">
					<span>
						Total général
					</span>
					<span>
						{{ Number::currency($grand_total,'TND') }}
					</span>
				</div>
				</hr>
			</div>
			<button wire:click="placeOrder" type="submit" class="bg-green-500 mt-4 w-full p-3 rounded-lg text-lg 
			text-white hover:bg-green-600">
				<span wire:loading.remove>Passer la commande</span>
				<span wire:loading>Traitement...</span>
		</button>
			<div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
				<div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
					RÉCAPITULATIF DU PANIER
				</div>
				<ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">
                    
                    @foreach ($cart_items as $ci)
                    <li class="py-3 sm:py-4" wire:key='{{ $ci['product_id'] }}'>
						<div class="flex items-center">
							<div class="flex-shrink-0">
								<img alt="{{ $ci['name'] }}" class="w-12 h-12 rounded-full" src="{{ url('storage', $ci ['image']) }}">
								</img>
							</div>
							<div class="flex-1 min-w-0 ms-4">
								<p class="text-sm font-medium text-gray-900 truncate dark:text-white">
									{{ $ci['name'] }}
								</p>
								<p class="text-sm text-gray-500 truncate dark:text-gray-400">
									Quantity: {{ $ci['quantity'] }}
								</p>
							</div>
							<div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
								{{ Number::currency($ci['total_amount'], 'TND') }}
							</div>
						</div> 
					</li> 
                    @endforeach
				</ul>
			</div>
		</div>
	</div>
</div> 