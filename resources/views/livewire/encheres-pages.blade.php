<div class="bg-gray-300 py-10 px-4 min-h-screen">
  <div class="bg-white rounded-xl shadow-md max-w-7xl mx-auto p-6">
    
      <!-- Titre -->
      <div class="mb-6">
          <h1 class="text-3xl font-extrabold text-gray-800">
               Pièces En Enchères:
          </h1>
          <p class="text-sm  text-black mt-1">
              Découvrez nos pièces occasion en vente aux enchères en temps réel
          </p>
      </div>

      @if($auctions->isEmpty())
          <div class="text-center font-extrabold text-black py-10">
              Aucune enchère active pour le moment.<br>
              Revenez plus tard pour découvrir les nouvelles offres.
          </div>
      @else
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
              @foreach($auctions as $auction)
                  <div class="bg-white rounded-lg shadow border hover:shadow-lg transition overflow-hidden">
                      <!-- Image produit -->
                      <img src="{{ asset('storage/' . $auction->product->images[0]) }}"
                           alt="{{ $auction->product->name }}"
                           class="w-full h-60 object-cover">

                      <!-- Contenu enchère -->
                      <div class="p-4">
                          <h3 class="text-base font-semibold text-gray-800 mb-1">
                              {{ $auction->product->name }}
                          </h3>

                          <div class="flex justify-between text-sm text-gray-500 mb-1">
                              <span>Enchères : {{ $auction->bids->count() }}</span>
                              <span>Fin : {{ $auction->end_date->format('d/m/Y H:i') }}</span>
                          </div>

                          <div class="text-right mb-3">
                              <span class="text-blue-600 font-bold text-lg">
                                  {{ number_format($auction->current_price, 2) }} TND
                              </span>
                          </div>

                          <a href="{{ route('auction.detail', ['id' => $auction->id]) }}"
                             class="block text-center bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 rounded">
                              Voir l'enchère
                          </a>
                      </div>
                  </div>
              @endforeach
          </div>
      @endif
  </div>
</div>
