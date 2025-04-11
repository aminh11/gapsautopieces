<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-slate-500">Détails de la Commande</h1>
  
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mt-5">
  
      <!-- Client -->
      <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
        <div class="p-4 md:p-5 flex gap-x-4">
          <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
            <i class="fa fa-user text-gray-600"></i>
          </div>
          <div class="grow">
            <p class="text-xs uppercase tracking-wide text-gray-500">Client</p>
            <div class="mt-1">Jace Grimes</div>
          </div>
        </div>
      </div>
  
      <!-- Date -->
      <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
        <div class="p-4 md:p-5 flex gap-x-4">
          <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
            <i class="fa fa-calendar text-gray-600"></i>
          </div>
          <div class="grow">
            <p class="text-xs uppercase tracking-wide text-gray-500">Date</p>
            <div class="mt-1">17-02-2024</div>
          </div>
        </div>
      </div>
  
      <!-- Statut commande -->
      <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
        <div class="p-4 md:p-5 flex gap-x-4">
          <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
            <i class="fa fa-spinner text-gray-600"></i>
          </div>
          <div class="grow">
            <p class="text-xs uppercase tracking-wide text-gray-500">Statut Commande</p>
            <div class="mt-1"><span class="bg-yellow-500 py-1 px-3 rounded text-white shadow">En cours</span></div>
          </div>
        </div>
      </div>
  
      <!-- Statut Paiement -->
      <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
        <div class="p-4 md:p-5 flex gap-x-4">
          <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
            <i class="fa fa-credit-card text-gray-600"></i>
          </div>
          <div class="grow">
            <p class="text-xs uppercase tracking-wide text-gray-500">Paiement</p>
            <div class="mt-1"><span class="bg-green-500 py-1 px-3 rounded text-white shadow">Payé</span></div>
          </div>
        </div>
      </div>
  
    </div>
    <!-- End Grid -->
  
    <!-- Détails Produits -->
    <div class="flex flex-col md:flex-row gap-4 mt-4">
  
      <div class="md:w-3/4">
        <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
          <h2 class="text-xl font-bold mb-4">Produits</h2>
          <table class="w-full">
            <thead>
              <tr>
                <th class="text-left font-semibold">Produit</th>
                <th class="text-left font-semibold">Prix</th>
                <th class="text-left font-semibold">Quantité</th>
                <th class="text-left font-semibold">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="py-4">
                  <div class="flex items-center">
                    <img class="h-16 w-16 mr-4" src="http://localhost:8000/storage/products/01.jpg" alt="image produit">
                    <span class="font-semibold">Samsung Galaxy Watch6</span>
                  </div>
                </td>
                <td class="py-4">29 999,00 TND</td>
                <td class="py-4">1</td>
                <td class="py-4">29 999,00 TND</td>
              </tr>
  
              <tr>
                <td class="py-4">
                  <div class="flex items-center">
                    <img class="h-16 w-16 mr-4" src="http://localhost:8000/storage/products/02.jpg" alt="image produit">
                    <span class="font-semibold">Samsung Galaxy Book3</span>
                  </div>
                </td>
                <td class="py-4">75 000,00 TND</td>
                <td class="py-4">5</td>
                <td class="py-4">375 000,00 TND</td>
              </tr>
            </tbody>
          </table>
        </div>
  
        <!-- Adresse Livraison -->
        <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
          <h2 class="text-xl font-bold mb-4">Adresse de Livraison</h2>
          <div class="flex justify-between items-center">
            <p>42227 Zoila Glens, Oshkosh, Michigan, 55928</p>
            <div>
              <p class="font-semibold">Téléphone :</p>
              <p>023-509-0009</p>
            </div>
          </div>
        </div>
      </div>
  
      <!-- Récapitulatif -->
      <div class="md:w-1/4">
        <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-lg font-semibold mb-4">Résumé</h2>
          <div class="flex justify-between mb-2"><span>Sous-total</span><span>404 999,00 TND</span></div>
          <div class="flex justify-between mb-2"><span>Taxes</span><span>0,00 TND</span></div>
          <div class="flex justify-between mb-2"><span>Livraison</span><span>0,00 TND</span></div>
          <hr class="my-2">
          <div class="flex justify-between mb-2 font-bold"><span>Total</span><span>404 999,00 TND</span></div>
        </div>
      </div>
  
    </div>
  </div>
  