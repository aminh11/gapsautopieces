<div class="w-full">
  
<!-- HERO -->
<div class="w-full bg-cover bg-center py-14 px-6 lg:px-20" style="background-image: url('/chemin/vers/ton-image.jpg');">
  <div class="bg-black/50 w-full h-full py-10 px-6 lg:px-20">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-10">

      <!-- Texte à gauche -->
      <div class="text-white">
        <h1 class="text-4xl lg:text-6xl font-extrabold mb-6">
          Trouvez la pièce parfaite <br> au meilleur prix !
        </h1>

        <p class="mb-8 text-lg">
          Découvrez notre large sélection de pièces automobiles d'occasion certifiées.
        </p>

        <div class="flex flex-wrap gap-4">
          <a href="/encheres"
            class="py-3 px-6 inline-block bg-orange-600 hover:bg-orange-700 text-white font-semibold rounded-lg">
            Explorer les Enchères
          </a>

          <a href="/pieceoccassion"
            class="py-3 px-6 inline-block bg-black text-white font-semibold rounded-lg hover:bg-blue-600">
            Voir les Pièces d'Occasion
          </a>
        </div>
      </div>

      <!-- Image moteur à droite -->
      <div class="flex justify-center">
        <img src="https://www.gpa26.com/img/cms/piece-auto.png" alt="Moteur" class="rounded-lg shadow-lg w-full max-w-[500px]">
      </div>

    </div>
  </div>
</div>
<!-- Marques Populaires -->
<section class="py-20">
  <div class="max-w-xl mx-auto">
    <div class="text-center ">
      <div class="relative flex flex-col items-center">
        <h1 class="text-5xl font-bold dark:text-gray-200">Découvrez les <span class="text-blue-500">Marques Populaires</span></h1>
        <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
          <div class="flex-1 h-2 bg-blue-200"></div>
          <div class="flex-1 h-2 bg-blue-400"></div>
          <div class="flex-1 h-2 bg-blue-600"></div>
        </div>
      </div>
      <p class="mb-12 text-base text-center text-gray-500">
        Retrouvez les marques les plus connues et les plus appréciées sur notre plateforme.
      </p>
    </div>
  </div>

  <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-4 md:grid-cols-2">
      @foreach ($brands as $brand)
      <div class="bg-white rounded-lg shadow-md dark:bg-gray-800" wire:key="{{ $brand->id }}">
        <a href="/pieceoccassion?selected_brands[0]={{ $brand->id }}" class=''>
          <img src="{{ url('storage', $brand->image) }}" alt="{{ $brand->name }}" class="object-cover w-full h-64 rounded-t-lg">
        </a>
        <div class="p-5 text-center">
          <a href="#" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
            {{ $brand->name }}
          </a>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>

<!--Pièces en Enchères-->

<div class="py-14 px-6 lg:px-20 bg-gray-100">
  <h2 class="text-2xl text-center lg:text-3xl font-bold mb-8 text-gray-900">
    Pièces en Enchères
  </h2>

  @if($auctions->isEmpty())
    <div class="text-center font-extrabold text-blac">
      Aucune enchère active pour le moment.<br>
      Revenez plus tard pour découvrir les nouvelles offres.
    </div>
  @else
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
      @foreach ($auctions as $auction)
      <div class="bg-white border rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-300 ease-in-out">
        <img src="{{ $auction->product->images && is_array($auction->product->images) && count($auction->product->images) > 0 ? url('storage/'.$auction->product->images[0]) : asset('images/logo.png') }}" 
             alt="{{ $auction->product->name }}" 
             class="h-[180px] w-full object-cover">
        <div class="p-4">
          <h3 class="font-semibold text-sm mb-1">{{ $auction->product->name }}</h3>
          <p class="text-xs text-gray-600 mb-1">{{ $auction->product->brand->name }}</p>
          <span class="inline-block bg-green-100 text-green-700 text-[10px] font-medium px-2 py-[1px] rounded mb-2">
            {{ $auction->product->on_sale ? 'En Promotion' : 'Reconditionné' }}
          </span>
          <div class="flex justify-between items-center mb-2">
          
            <span class="text-blue-700 font-bold text-sm">{{ Number::currency($auction->current_price, 'TND') }}</span>
            <span class="text-red-500 text-[10px]">
              @if($auction->end_date->diffInDays(now()) > 0)
                {{ $auction->end_date->diff(now())->format('%dd %Hh') }}
              @else
                {{ $auction->end_date->diff(now())->format('%Hh %Im') }}
              @endif
            </span>
          </div>
          <a href="/auctions/{{ $auction->id }}" class="w-full bg-gray-900 text-white text-xs py-2 rounded hover:bg-orange-700 inline-block text-center">Enchérir</a>
        </div>
      </div>
      @endforeach
    </div>
    
  <div class="mt-8 text-center">
    <a href="/encheres" class="cursor-pointer bg-black hover:bg-orange-600 text-white font-medium py-2 px-6 rounded-md transition duration-300">
      Voir plus de produits en enchère
    </a>
  </div>
  @endif

</div>$


    

    
  

 
<!--pieceoccassion (catalogue catégories) -->
  <div class="py-20 px-4 lg:px-20 bg-white">
    <div class="max-w-7xl mx-auto">
      
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($pieceoccassion as $pieceoccassion)
        <a href="/pieceoccassion?selected_catalogue[0]= {{ $pieceoccassion->id }}" wire:key="{{ $pieceoccassion->id }}" 
           class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition duration-300">
        
            <img src="{{ url('storage/'.$pieceoccassion->image) }}" 
                 alt="{{ $pieceoccassion->name }}" 
                 class="w-full h-40 object-cover">
        
            <div class="p-3 text-center">
                <h3 class="font-semibold text-gray-800 group-hover:text-blue-600 capitalize text-sm">
                    {{ $pieceoccassion->name }}
                </h3>
            </div>
        
        </a>
        @endforeach
        </div>
        
  {{-- boutton catalogue--}}
      <div class="flex justify-center mt-10">
        <a href="/catalogue" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold text-sm">
          Explorer le Catalogue
        </a>
      </div>
    </div>   

</div>
