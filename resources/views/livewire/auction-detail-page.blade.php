<div class="max-w-7xl mx-auto py-10 px-4 grid grid-cols-1 lg:grid-cols-2 gap-8">

    <!-- Image Produit -->
    <div>
        @if($auction->product->images && count($auction->product->images) > 0)
            <img src="{{ asset('storage/' . $auction->product->images[0]) }}" alt="{{ $auction->product->name }}"
                class="rounded-lg w-full">

            @if(count($auction->product->images) > 1)
                <div class="flex space-x-2 mt-4">
                    @foreach(array_slice($auction->product->images, 0, 4) as $index => $image)
                        <img src="{{ asset('storage/' . $image) }}" class="w-20 h-20 border rounded-lg cursor-pointer">
                    @endforeach
                </div>
            @endif
        @else
            <div class="w-full h-96 bg-gray-200 flex items-center justify-center rounded-lg">
                <span class="text-gray-400">Pas d'image</span>
            </div>
        @endif
    </div>

    <!-- Informations des Produits -->
    <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $auction->product->name }}</h2>
        <span class="text-green-600 text-sm font-medium mb-4 inline-block">
            @if($auction->product->in_stock)
                En stock
            @else
                Rupture de stock
            @endif
        </span>

        <div class="bg-gray-100 p-4 rounded-lg flex justify-between mb-4">
            <div class="text-center">
                <p class="text-xs text-gray-500">Début</p>
                <p class="font-medium">{{ $auction->start_date->format('d/m/Y H:i') }}</p>
            </div>
            <div class="text-center">
                <p class="text-xs text-gray-500">Fin</p>
                <p class="font-medium">{{ $auction->end_date->format('d/m/Y H:i') }}</p>
            </div>
            <div class="text-center">
                <p class="text-xs text-gray-500">Statut</p>
                <p class="font-medium">
                    @if($auction->isActive())
                        <span class="text-green-600">Active</span>
                    @elseif($auction->hasEnded())
                        <span class="text-red-600">Terminée</span>
                    @else
                        <span class="text-gray-600">{{ ucfirst($auction->status) }}</span>
                    @endif
                </p>
            </div>
        </div>

        @if($auction->isActive())
            <div class="bg-blue-50 p-4 rounded-lg mb-4">
                <p class="text-center text-sm text-gray-500 mb-2">Temps restant</p>
                <div class="grid grid-cols-4 gap-2 text-center" id="countdown-timer"
                    data-end="{{ $auction->end_date->timestamp }}">
                    <div class="bg-white p-2 rounded shadow-sm">
                        <span id="days" class="block text-xl font-bold text-blue-600">--</span>
                        <span class="text-xs text-gray-500">Jours</span>
                    </div>
                    <div class="bg-white p-2 rounded shadow-sm">
                        <span id="hours" class="block text-xl font-bold text-blue-600">--</span>
                        <span class="text-xs text-gray-500">Heures</span>
                    </div>
                    <div class="bg-white p-2 rounded shadow-sm">
                        <span id="minutes" class="block text-xl font-bold text-blue-600">--</span>
                        <span class="text-xs text-gray-500">Minutes</span>
                    </div>
                    <div class="bg-white p-2 rounded shadow-sm">
                        <span id="seconds" class="block text-xl font-bold text-blue-600">--</span>
                        <span class="text-xs text-gray-500">Secondes</span>
                    </div>
                </div>
            </div>
        @endif

        <p class="text-xl font-bold text-blue-600 mb-2">Prix actuel: {{ number_format($auction->current_price, 2) }} TND
        </p>
        <p class="text-sm text-gray-500 mb-4">Prix de départ: {{ number_format($auction->starting_price, 2) }} TND</p>

        @if($auction->isActive())
            <form wire:submit.prevent="placeBid" class="mb-6">
                <div class="flex mb-2">
                    <input type="number" wire:model="bidAmount"
                        placeholder="Votre offre (min. {{ number_format($auction->current_price + $auction->bid_increment, 2) }} TND)"
                        class="border rounded-l-lg px-4 py-2 w-full">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700">Enchérir</button>
                </div>
                @error('bidAmount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </form>
        @else
            <div class="bg-gray-100 p-4 rounded-lg mb-6">
                <p class="text-center text-gray-700">Cette enchère est
                    {{ $auction->hasEnded() ? 'terminée' : 'en attente' }}</p>
            </div>
        @endif

        <div class="mb-6">
            <h3 class="font-semibold text-gray-700 mb-2">Description:</h3>
            <div class="text-sm text-gray-600">
                {!! $auction->product->description !!}
            </div>
        </div>

        <div class="border-t pt-4">
            <h3 class="font-semibold text-gray-700 mb-2">Historique des Enchères</h3>

            @if($auction->bids->isEmpty())
                <p class="text-sm text-gray-500">Aucune enchère pour le moment</p>
            @else
                @foreach($auction->bids->sortByDesc('created_at') as $bid)
                    <div class="flex justify-between text-sm mb-1 {{ $bid->is_winning ? 'font-bold' : '' }}">
                        <span>{{ $bid->user->name }}</span>
                        <span>{{ number_format($bid->amount, 2) }} TND</span>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>