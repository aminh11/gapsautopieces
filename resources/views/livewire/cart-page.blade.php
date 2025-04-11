<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container mx-auto px-4">
      <h1 class="text-2xl font-semibold mb-4">Panier</h1>
  
      <div class="flex flex-col md:flex-row gap-4">
        <!-- Partie Produits -->
        <div class="md:w-3/4">
          <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
            <table class="w-full">
              <thead>
                <tr>
                  <th class="text-left font-semibold">Produit</th>
                  <th class="text-left font-semibold">Prix</th>
                  <th class="text-left font-semibold">Quantité</th>
                  <th class="text-left font-semibold">Total</th>
                  <th class="text-left font-semibold">Supprimer</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="py-4">
                    <div class="flex items-center">
                      <img class="h-16 w-16 mr-4" src="https://via.placeholder.com/150" alt="Image produit">
                      <span class="font-semibold">Nom du Produit</span>
                    </div>
                  </td>
                  <td class="py-4">19,99 TND</td>
                  <td class="py-4">
                    <div class="flex items-center">
                      <button class="border rounded-md py-2 px-4 mr-2">-</button>
                      <span class="text-center w-8">1</span>
                      <button class="border rounded-md py-2 px-4 ml-2">+</button>
                    </div>
                  </td>
                  <td class="py-4">19,99 TND</td>
                  <td>
                    <button class="bg-slate-300 border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white hover:border-red-700">
                      Supprimer
                    </button>
                  </td>
                </tr>
                <!-- Ajouter ici les autres produits -->
              </tbody>
            </table>
          </div>
        </div>
  
        <!-- Partie Résumé -->
        <div class="md:w-1/4">
          <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4">Résumé de la commande</h2>
  
            <div class="flex justify-between mb-2">
              <span>Sous-total</span>
              <span>19,99 TND</span>
            </div>
  
            <div class="flex justify-between mb-2">
              <span>Taxes</span>
              <span>1,99 TND</span>
            </div>
  
            <div class="flex justify-between mb-2">
              <span>Livraison</span>
              <span>Gratuite</span>
            </div>
  
            <hr class="my-2">
  
            <div class="flex justify-between mb-2">
              <span class="font-semibold">Total à payer</span>
              <span class="font-semibold">21,98 TND</span>
            </div>
  
            <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full hover:bg-blue-600">
              Passer à la caisse
            </button>
          </div>
        </div>
  
      </div>
    </div>
  </div>
  