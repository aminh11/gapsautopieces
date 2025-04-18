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

                <!--dynamique pour produits dans panier page-->
                @forelse ($cart_items as $item)
                <tr wire:key='{{ $item['product_id'] }}'>
                  <td class="py-4">
                    <div class="flex items-center">
                      <img class="h-16 w-16 mr-4" src="{{ url ('storage', $item['image']) }}" alt="I$item['name']}}">
                      <span class="font-semibold">{{ $item['name'] }}</span>
                    </div>
                  </td>

                  <td class="py-4">{{ Number::currency($item['unit_amount'], 'TND') }}
                  </td>

                  <td class="py-4">
                    <div class="flex items-center">
                      <span class="text-center w-8">{{ $item['quantity'] }}</span>
                    </div>
                  </td>
                   <!-- le montant totatl est calculé automatiquement en fonction de la quantité et monatant unitaitre -->
                  <td class="py-4">{{ Number::currency($item['total_amount'], 'TND') }}</td>
                  <td>
                    <button wire:click='removeItem({{ $item['product_id'] }})' class="bg-slate-300 
                    border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 
                    hover:text-white hover:border-red-700"><span wire:loading.remove wire:target='removeItem({{ $item
                    ['product_id'] }})'>Supprimer</span><span wire:loading wire:target='removeItem({{ $item
                    ['product_id'] }})'>Supprimé...</span></button>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center py-4 text-4xl font-semibold -text-slate-5000">
                    Aucun article disponible dans le panier!</td>
                </tr>
                   
                @endforelse
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
              <span>{{ Number::currency($grand_total, 'TND') }}</span>
            </div>
  
            <div class="flex justify-between mb-2">
              <span>Taxes</span>
              <span>{{ Number::currency(0, 'TND') }}</span>
            </div>
  
            <div class="flex justify-between mb-2">
              <span>Livraison</span>
              <span>{{ Number::currency(0, 'TND') }}</span>
            </div>
  
            <hr class="my-2">
            <div class="flex justify-between mb-2">
              <span class="font-semibold">Total à payer</span>
              <span class="font-semibold">{{ Number::currency($grand_total, 'TND') }}</span>
            </div>
            <!-- Vérifier condition s'il ya a un article de panier disponible alors seulmenet nous afficherons ce bouton de paiment 
            sinon ce bouton ne sera pas visible-->
            @if ($cart_items)
            <button class="bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full hover:bg-blue-600">Passer à la caisse </button>
            @endif
          </div>
        </div>
  
      </div>
    </div>
  </div>
  