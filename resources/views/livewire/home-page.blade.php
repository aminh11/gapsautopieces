<div> <!-- ✅ seul élément racine -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- texte défilant -->
  <div class="w-full bg-marquee overflow-hidden py-3">
    <div x-data="{ offset: 0 }"
         x-init="setInterval(() => offset -= 1, 30)"
         class="whitespace-nowrap"
         :style="'transform: translateX(' + offset + 'px)'"
         style="display: inline-block; will-change: transform;">
         
      <span class="inline-block text-white text-lg tracking-wider mx-10">
        Bienvenue Chez Gaps Pièces Auto • Ici, La Qualité Rencontre L’économie • Achetez En Toute Confiance
      </span>
      <span class="inline-block text-white text-lg tracking-wider mx-10">
        Bienvenue Chez Gaps Pièces Auto • Ici, La Qualité Rencontre L’économie • Achetez En Toute Confiance 
      </span>
  
    </div>
  </div>
  
<!-- Hero -->
<div class="w-full bg-gray-200 py-8 px-4 lg:px-16">
  <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-8">

    <!-- Texte -->
    <div class="text-gray-800">
      <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4">
        Trouvez la pièce parfaite <br> au meilleur prix !
      </h1>
      <p class="mb-6 text-lg md:text-xl">
        Découvrez notre large sélection de pièces automobiles d'occasion certifiées.
      </p>
      <div class="flex flex-wrap gap-4">
        <a href="/encheres" class="py-2.5 px-5 inline-block bg-orange-600 hover:bg-orange-700 text-white font-semibold rounded-lg">
          Explorer les Enchères
        </a>
        <a href="/pieceoccassion" class="py-2.5 px-5 inline-block bg-black text-white font-semibold rounded-lg hover:bg-blue-600">
          Voir les Pièces d'Occasion
        </a>
      </div>
    </div>

    <!-- Image Changeante -->
    <div class="flex justify-center">
      <div 
        x-data="{
          images: [
          '/images/client2.png',
          '/images/piece.png',
            '/images/promotion.png',
            '/images/enchere.png'
          ],
          activeIndex: 0,
          startSlider() {
            setInterval(() => {
              this.activeIndex = (this.activeIndex + 1) % this.images.length
            }, 4000)
          }
        }"
        x-init="startSlider()"
        class="relative w-full h-[300px] md:h-[400px] bg-gray-300 overflow-hidden rounded-2xl shadow-xl"
      >
        <template x-for="(image, index) in images" :key="index">
          <img
            :src="image"
            alt="Image Pièce Auto"
            class="absolute top-0 left-0 w-full h-full object-cover transition-all duration-2000 ease-in-out"
            :class="{
              'opacity-100 scale-100': index === activeIndex,
              'opacity-0 scale-110': index !== activeIndex
            }"
          >
        </template>
      </div>
    </div>

  </div>
</div>

<!-- Alpine.js -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


  <!-- Animation des images -->
  <section class="relative h-screen w-full overflow-hidden">
    <div class="slider-container h-full w-full relative">
      <div class="left-slide absolute top-0 left-0 w-1/3 h-full transition-transform duration-500">
        <div class="flex items-center justify-center flex-col text-white h-full" style="background-color: #2E2F32">
          <h1 class="text-4xl mb-2">Contrôlez vos feux</h1>
          <p>Phares, clignotants, feux arrière</p>
        </div>

        <div class="flex items-center justify-center flex-col text-black h-full" style="background-color: #D8D9DA">
          <h1 class="text-4xl mb-2">Vérifiez la Pression des Pneus</h1>
          <p>Confort, sécurité et économies de carburant assurés</p>
        </div>

        <div class="flex items-center justify-center flex-col text-white h-full" style="background-color: #7C7C7C">
          <h1 class="text-4xl mb-2">Surveillez vos Freins</h1>
          <p>Remplacez disques et plaquettes dès les premiers signes d’usure</p>
        </div>

        <div class="flex items-center justify-center flex-col text-white h-full" style="background-color: #3B4DC5">
          <h1 class="text-4xl mb-2">Vérifiez votre Moteur</h1>
          <p>Vidange, filtres et courroies à surveiller régulièrement</p>
        </div>
      </div>

      <div class="right-slide absolute top-0 left-1/3 w-2/3 h-full transition-transform duration-500">
        <div class="bg-cover bg-center w-full h-full" style="background-image: url('{{ asset('images/moteuramg.jpg') }}');"></div>
        <div class="bg-cover bg-center w-full h-full" style="background-image: url('{{ asset('images/frien.jpg') }}');"></div>
        <div class="bg-cover bg-center w-full h-full" style="background-image: url('{{ asset('images/pression.jpg') }}');"></div>        
        <div class="bg-cover bg-center w-full h-full" style="background-image: url('{{ asset('images/feux.jpg') }}');"></div>
      </div>
  
      <div class="action-buttons absolute top-1/2 left-1/3 transform -translate-x-1/2 -translate-y-1/2 flex flex-col space-y-2">
        <button class="up-button bg-white p-3 rounded-full shadow-md hover:bg-gray-100">
          <i class="fas fa-arrow-up text-gray-700"></i>
        </button>
        <button class="down-button bg-white p-3 rounded-full shadow-md hover:bg-gray-100">
          <i class="fas fa-arrow-down text-gray-700"></i>
        </button>
      </div>
    </div>
  </section>

  <!-- Marques Populaires -->
<section class="py-20">
  <div class="max-w-xl mx-auto text-center">
    <h1 class="text-5xl font-bold dark:text-gray-200">
      Découvrez les <span class="text-blue-500">Marques Populaires</span>
    </h1>
    <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
      <div class="flex-1 h-2 bg-blue-200"></div>
      <div class="flex-1 h-2 bg-blue-400"></div>
      <div class="flex-1 h-2 bg-blue-600"></div>
    </div>
    <p class="mb-12 text-base text-gray-500">
      Retrouvez les marques les plus connues et les plus appréciées sur notre plateforme.
    </p>
  </div>

  <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-4 md:grid-cols-2">
      @foreach ($brands as $brand)
      <div class="card3d bg-white rounded-lg shadow-md dark:bg-gray-800 transition-transform duration-300" wire:key="{{ $brand->id }}">
        <a href="/pieceoccassion?selected_brands[0]={{ $brand->id }}">
          <img src="{{ url('storage', $brand->image) }}" alt="{{ $brand->name }}" class="object-cover w-full h-64 rounded-t-lg">
        </a>
        <div class="p-5 text-center">
          <span class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">{{ $brand->name }}</span>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
  

<!-- Pièces en Enchères -->
<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <h1 class="text-3xl font-bold text-gray-800 mb-8">Pièces en Enchères</h1>

  @if($auctionProducts->isEmpty())
    <div class="text-center py-12">
      <h2 class="text-xl font-medium text-gray-600">Aucune enchère active pour le moment</h2>
      <p class="mt-2 text-gray-500">Revenez plus tard pour voir les nouvelles enchères</p>
    </div>
  @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
      @foreach($auctionProducts as $auction)
      <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
        <a href="{{ route('auction.detail', $auction->id) }}" class="block">
        @if($auction->product && $auction->product->images && is_array($auction->product->images) && count($auction->product->images) > 0)
          <img src="{{ asset('storage/' . $auction->product->images[0]) }}" 
               alt="{{ $auction->product->name }}" 
               class="w-full h-48 object-cover">
      @else
          <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
              <span class="text-gray-400">Pas d'image</span>
          </div>
      @endif
          <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
              {{ $auction->product?->name ?? 'Produit inconnu' }}
            </h3>
            <div class="flex justify-between items-center mb-3">
              <span class="text-sm text-gray-500">Prix actuel:</span>
              <span class="text-lg font-bold text-blue-600">
                {{ number_format($auction->current_price, 2) }} TND
              </span>
            </div>
            <div class="flex justify-between items-center mb-3">
              <span class="text-sm text-gray-500">Enchères:</span>
              <span class="text-sm font-medium">
                {{ $auction->bids->count() }}
              </span>
            </div>
            <div class="bg-gray-100 p-2 rounded-lg text-xs text-gray-600">
              <div class="flex justify-between">
                <span>Fin:</span>
                <span>{{ $auction->end_date->format('d/m/Y H:i') }}</span>
              </div>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>

    <div class="mt-8 text-center">
      <a href="/encheres" class="bg-black hover:bg-orange-600 text-white font-medium py-2 px-6 rounded-md transition duration-300">
        Voir plus de produits en enchère
      </a>
    </div>
  @endif
</div>


  <!-- Catalogue avec effet 3D animé -->
<section class="py-20 px-4 lg:px-20 bg-white">
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      @foreach ($pieceoccassion as $piece)
        <div class="card-3d-container">
          <div class="card-3d">
            <div class="card-image">
              <img src="{{ url('storage/'.$piece->image) }}" alt="{{ $piece->name }}">
            </div>
            <div class="card-info">
              <h3>{{ $piece->name }}</h3>
              <a href="/pieceoccassion?selected_catalogue[0]={{ $piece->id }}" class="btn">Voir plus</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

</div>
<script src="{{ asset('vertical-slider.js') }}"></script>

