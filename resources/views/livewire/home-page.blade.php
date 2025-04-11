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
          <a href="#"
            class="py-3 px-6 inline-block bg-orange-600 hover:bg-orange-700 text-white font-semibold rounded-lg">
            Explorer les Enchères
          </a>

          <a href="#"
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
        <a href="#" class=''>
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
  <h2 class="text-2xl lg:text-3xl font-bold mb-8 text-gray-900">
    Pièces en Enchères
  </h2>

  <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

<!-- Carte Produit 1-->
<div class="bg-white border rounded-lg overflow-hidden shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-300 ease-in-out">
  <img src="https://cdn.proxyparts.com/parts/101314/12690661/large/3048864e-5d12-478c-af48-72ad303dbf6b.jpg" alt="Moteur" class="h-[180px] w-full object-cover">
  <div class="p-4">
    <h3 class="font-semibold text-sm mb-1">Moteur 2.0 TDI</h3>
    <p class="text-xs text-gray-600 mb-1">Volkswagen Golf 7</p>
    <span class="inline-block bg-green-100 text-green-700 text-[10px] font-medium px-2 py-[1px] rounded mb-2">Reconditionné</span>
    <div class="flex justify-between items-center mb-2">
      <span class="text-blue-700 font-bold text-sm">2,500 TND</span>
      <span class="text-red-500 text-[10px]">2h 15m</span>
    </div>
    <button class="w-full bg-gray-900 text-white text-xs py-2 rounded hover:bg-orange-700">Enchérir</button>
  </div>
</div>

    <!-- Carte Produit 2 -->
    <div class="bg-white border rounded-lg overflow-hidden shadow-xl transform hover:scale-105 hover:shadow-2xl transition duration-900">      <img src="https://cdn.proxyparts.com/parts/101277/15112028/large/faed19fc-b9c8-4fa9-9936-df792515d0b0.jpg" alt="Boite" class="h-[180px] w-full object-cover">
      <div class="p-4">
        <h3 class="font-semibold text-sm mb-1">Boite de Vitesses</h3>
        <p class="text-xs text-gray-600 mb-1">BMW</p>
        <span class="inline-block bg-blue-100 text-blue-700 text-[10px] font-medium px-2 py-[1px] rounded mb-2">Neuf</span>
        <div class="flex justify-between items-center mb-2">
          <span class="text-blue-700 font-bold text-sm">3,200 TND</span>
          <span class="text-red-500 text-[10px]">4h 30m</span>
        </div>
        <button class="w-full bg-gray-900 text-white text-xs py-2 rounded hover:bg-orange-700">Enchérir</button>
      </div>
    </div>

    <!-- Carte Produit 3 -->
    <div class="bg-white border rounded-lg overflow-hidden shadow-xl  transform hover:scale-105 hover:shadow-2xl transition duration-900">      <img src="https://www.mikadoracing.com/annonces/images/2018_10/cb74a09ece7d8251a1660234c5f21ca3.jpg" alt="Freinage" class="h-[180px] w-full object-cover">
      <div class="p-4">
        <h3 class="font-semibold text-sm mb-1">Kit Freinage Complet</h3>
        <p class="text-xs text-gray-600 mb-1">BMW</p>
        <span class="inline-block bg-yellow-100 text-yellow-700 text-[10px] font-medium px-2 py-[1px] rounded mb-2">Usagé</span>
        <div class="flex justify-between items-center mb-2">
          <span class="text-blue-700 font-bold text-sm">800 TND</span>
          <span class="text-red-500 text-[10px]">1h 45m</span>
        </div>
        <button class="w-full bg-gray-900 text-white text-xs py-2 rounded hover:bg-orange-700">Enchérir</button>
      </div>
    </div>
        <!-- Carte Produit 4 -->
        <div class="bg-white border rounded-lg overflow-hidden shadow-xl transform hover:scale-105 hover:shadow-2xl transition duration-900">          <img src="https://opisto-prod-pic.opisto.s3.eu-west-1.bso.st/4587/po_photo/2024/08/91209261-644d6389-acb8-4457-b091-ee3da5cf609a-Piece-Porte-avant-gauche-2047205900-MERCEDES-CLASSE-C-204-PHASE-1-74531a8591b55ddcc9b03a60b8698ef50a256b4caceba7ca392461eaed78ee1f_m.jpg" alt="Moteur" class="h-[180px] w-full object-cover">
          <div class="p-4">
            <h3 class="font-semibold text-sm mb-1">Porte avant gauche</h3>
            <p class="text-xs text-gray-600 mb-1">MERCEDES CLASSE C</p>
            <span class="inline-block bg-green-100 text-green-700 text-[10px] font-medium px-2 py-[1px] rounded mb-2">Reconditionné</span>
            <div class="flex justify-between items-center mb-2">
              <span class="text-blue-700 font-bold text-sm">1,100 TND</span>
              <span class="text-red-500 text-[10px]">2h 15m</span>
            </div>
            <button class="w-full bg-gray-900 text-white text-xs py-2 rounded hover:bg-orange-700">Enchérir</button>
          </div>
        </div>
  </div>

  <div class="mt-8 text-center">
    <button class="bg-black hover:bg-orange-600 text-white font-medium py-2 px-6 rounded-md transition duration-300">
      Voir plus de produits en enchère
    </button>
  </div>
</div>

  <div class="py-20 px-4 lg:px-20 bg-white">
    <div class="max-w-7xl mx-auto">
      
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($pieceoccassion as $pieceoccassion)
        <a href="#" wire:key="{{ $pieceoccassion->id }}" 
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
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold text-sm">
          Explorer le Catalogue
        </a>
      </div>
    </div>   

</div>
