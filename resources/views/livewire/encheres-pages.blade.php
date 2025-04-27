<div class="bg-gray-300 py-10 px-4 min-h-screen">
    <div class="bg-white rounded-xl shadow-md max-w-7xl mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <!-- Filtres à gauche -->
            <div class="md:col-span-1">
                <div class="p-4 mb-5 bg-white border border-gray-200 rounded-lg">
                    <h2 class="text-xl font-bold mb-4">Marques de voiture</h2>
                    <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>

                    <ul>
                        @foreach ($carbrands as $carbrand)
                            <li class="mb-4" wire:key="carbrand-{{ $carbrand->id }}">
                                <label class="flex items-center text-gray-600">
                                    <input 
                                        type="checkbox" 
                                        wire:model.live="selected_carbrands" 
                                        value="{{ $carbrand->id }}"
                                        class="w-4 h-4 mr-2 text-orange-600 focus:ring-orange-500 border-gray-300 rounded">
                                    <span class="text-lg">{{ $carbrand->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Enchères à droite -->
            <div class="md:col-span-3">
                <div class="mb-6">
                    <h1 class="text-3xl font-extrabold text-gray-800">Pièces En Enchères :</h1>
                    <p class="text-sm text-black mt-1">
                        Découvrez nos pièces occasion en vente aux enchères en temps réel
                    </p>
                </div>

                @if ($auctions->isEmpty())
                    <div class="text-center font-extrabold text-black py-10">
                        Aucune enchère active pour le moment.<br>
                        Revenez plus tard pour découvrir les nouvelles offres.
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                        @foreach ($auctions as $auction)
                            <div class="bg-white rounded-lg shadow border hover:shadow-lg transition overflow-hidden">
                                <img src="{{ asset('storage/' . $auction->product->images[0]) }}"
                                     alt="{{ $auction->product->name }}"
                                     class="w-full h-60 object-cover">

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

                    <!-- Pagination -->
                    <div class="flex justify-center mt-6">
                        {{ $auctions->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
