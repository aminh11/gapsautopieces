<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <h1 class="text-3xl font-bold text-gray-800 mb-8">Enchères en cours</h1>

  @if($auctions->isEmpty())
    <div class="text-center py-12">
    <h2 class="text-xl font-medium text-gray-600">Aucune enchère active pour le moment</h2>
    <p class="mt-2 text-gray-500">Revenez plus tard pour voir les nouvelles enchères</p>
    </div>
  @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach($auctions as $auction)
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
      <a href="{{ route('auction.detail', $auction->id) }}" class="block">
      @if($auction->product->images && count($auction->product->images) > 0)
      <img src="{{ asset('storage/' . $auction->product->images[0]) }}" alt="{{ $auction->product->name }}"
      class="w-full h-48 object-cover">
    @else
      <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
      <span class="text-gray-400">Pas d'image</span>
      </div>
    @endif

      <div class="p-4">
      <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $auction->product->name }}</h3>

      <div class="flex justify-between items-center mb-3">
      <span class="text-sm text-gray-500">Prix actuel:</span>
      <span class="text-lg font-bold text-blue-600">{{ number_format($auction->current_price, 2) }} TND</span>
      </div>

      <div class="flex justify-between items-center mb-3">
      <span class="text-sm text-gray-500">Enchères:</span>
      <span class="text-sm font-medium">{{ $auction->bids->count() }}</span>
      </div>

      <div class="bg-gray-100 p-2 rounded-lg text-xs text-gray-600">
      <div class="flex justify-between mb-1">
        <span>Fin:</span>
        <span>{{ $auction->end_date->format('d/m/Y H:i') }}</span>
      </div>
      <div class="countdown-small grid grid-cols-4 gap-1 text-center mt-1"
        data-end="{{ $auction->end_date->timestamp }}" data-auction-id="{{ $auction->id }}">
        <div class="bg-white p-1 rounded">
        <span class="days font-medium">--</span>j
        </div>
        <div class="bg-white p-1 rounded">
        <span class="hours font-medium">--</span>h
        </div>
        <div class="bg-white p-1 rounded">
        <span class="minutes font-medium">--</span>m
        </div>
        <div class="bg-white p-1 rounded">
        <span class="seconds font-medium">--</span>s
        </div>
      </div>
      </div>
      </div>
      </a>
    </div>
  @endforeach
    </div>

    <div class="mt-8">
    {{ $auctions->links() }}
    </div>

    @if(!$upcomingAuctions->isEmpty())
    <div class="mt-16">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Enchères à venir</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach($upcomingAuctions as $auction)
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
      <div class="relative">
      @if($auction->product->images && count($auction->product->images) > 0)
      <img src="{{ asset('storage/' . $auction->product->images[0]) }}" alt="{{ $auction->product->name }}"
      class="w-full h-48 object-cover">
    @else
      <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
      <span class="text-gray-400">Pas d'image</span>
      </div>
    @endif
      <div class="absolute top-0 right-0 bg-yellow-500 text-white px-3 py-1 text-xs font-bold">
      À venir
      </div>
      </div>

      <div class="p-4">
      <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $auction->product->name }}</h3>

      <div class="flex justify-between items-center mb-3">
      <span class="text-sm text-gray-500">Prix de départ:</span>
      <span class="text-lg font-bold text-blue-600">{{ number_format($auction->starting_price, 2) }} TND</span>
      </div>

      <div class="bg-gray-100 p-2 rounded-lg">
      <div class="text-xs text-gray-600 flex justify-between">
      <span>Début:</span>
      <span>{{ $auction->start_date->format('d/m/Y H:i') }}</span>
      </div>
      </div>
      </div>
      </div>
    @endforeach
    </div>
    </div>
  @endif
  @endif
</div>