<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
	<h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
		Passer la Commande
	</h1>

	<div class="grid grid-cols-12 gap-4">
		<!-- Formulaire -->
		<div class="md:col-span-12 lg:col-span-8 col-span-12">
			<div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">

				<h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
					Adresse de Livraison
				</h2>

				<div class="grid grid-cols-2 gap-4">
					<div>
						<label class="block text-gray-700 dark:text-white mb-1">Prénom</label>
						<input class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white" type="text">
					</div>
					<div>
						<label class="block text-gray-700 dark:text-white mb-1">Nom</label>
						<input class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white" type="text">
					</div>
				</div>

				<div class="mt-4">
					<label class="block text-gray-700 dark:text-white mb-1">Téléphone</label>
					<input class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white" type="text">
				</div>

				<div class="mt-4">
					<label class="block text-gray-700 dark:text-white mb-1">Adresse</label>
					<input class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white" type="text">
				</div>

				<div class="mt-4">
					<label class="block text-gray-700 dark:text-white mb-1">Ville</label>
					<input class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white" type="text">
				</div>

				<div class="grid grid-cols-2 gap-4 mt-4">
					<div>
						<label class="block text-gray-700 dark:text-white mb-1">Gouvernorat</label>
						<input class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white" type="text">
					</div>
					<div>
						<label class="block text-gray-700 dark:text-white mb-1">Code Postal</label>
						<input class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white" type="text">
					</div>
				</div>

				<h2 class="text-lg font-semibold mt-6 mb-4">
					Méthode de Paiement
				</h2>

				<ul class="grid w-full gap-6 md:grid-cols-2">
					<li>
						<input class="hidden peer" type="radio" name="paiement" id="livraison" value="livraison">
						<label class="inline-flex items-center justify-between w-full p-5 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 dark:border-gray-700 dark:text-gray-400">
							<div> Paiement à la Livraison</div>
						</label>
					</li>
					<li>
						<input class="hidden peer" type="radio" name="paiement" id="enligne" value="enligne">
						<label class="inline-flex items-center justify-between w-full p-5 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 dark:border-gray-700 dark:text-gray-400">
							<div> Carte Bancaire / D17</div>
						</label>
					</li>
				</ul>

			</div>
		</div>

		<!-- Récapitulatif -->
		<div class="md:col-span-12 lg:col-span-4 col-span-12">

			<div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900 mb-4">
				<h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
					RÉSUMÉ DE LA COMMANDE
				</h2>

				<div class="flex justify-between mb-2 font-bold">
					<span>Sous-total</span><span>450,00 TND</span>
				</div>
				<div class="flex justify-between mb-2 font-bold">
					<span>Taxes</span><span>0,00 TND</span>
				</div>
				<div class="flex justify-between mb-2 font-bold">
					<span>Livraison</span><span>0,00 TND</span>
				</div>

				<hr class="my-4">

				<div class="flex justify-between mb-2 font-bold text-lg">
					<span>Total à Payer</span><span>450,00 TND</span>
				</div>
			</div>

			<button class="bg-green-500 text-white w-full p-3 rounded-lg text-lg hover:bg-green-600">
				Confirmer la Commande
			</button>

			<!-- Récapitulatif Panier -->
			<div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
				<h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
					RÉCAPITULATIF DU PANIER
				</h2>

				<ul class="divide-y divide-gray-200 dark:divide-gray-700">
					<li class="py-3 flex items-center">
						<img class="w-12 h-12 rounded-full" src="https://iplanet.one/cdn/shop/files/iPhone_15_Pro_Max_Blue_Titanium_PDP_Image_Position-1__en-IN_1445x.jpg?v=1695435917" alt="">
						<div class="ml-4 flex-1">
							<p class="text-sm font-medium text-gray-900 dark:text-white">Apple iPhone 15 Pro Max</p>
							<p class="text-sm text-gray-500 dark:text-gray-400">Quantité : 1</p>
						</div>
						<div class="font-semibold text-gray-900 dark:text-white">320 TND</div>
					</li>

					<li class="py-3 flex items-center">
						<img class="w-12 h-12 rounded-full" src="https://iplanet.one/cdn/shop/files/iPhone_15_Pro_Max_Blue_Titanium_PDP_Image_Position-1__en-IN_1445x.jpg?v=1695435917" alt="">
						<div class="ml-4 flex-1">
							<p class="text-sm font-medium text-gray-900 dark:text-white">Apple iPhone 15 Pro Max</p>
							<p class="text-sm text-gray-500 dark:text-gray-400">Quantité : 1</p>
						</div>
						<div class="font-semibold text-gray-900 dark:text-white">320 TND</div>
					</li>

				</ul>
			</div>

		</div>

	</div>
</div>
