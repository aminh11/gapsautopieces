<header class="sticky top-0 z-50 w-full bg-white shadow-md dark:bg-gray-800">
  <nav class="max-w-[85rem] mx-auto flex items-center justify-between px-4 md:px-6 lg:px-8">

    
    <!-- Logo + Texte -->
    <div class="flex items-center gap-3 mr-auto">
      <a href="/" class="flex items-center gap-2">
        <img src="{{ asset('images/logo2.png') }}" alt="Logo GAPS Auto Pièces" class="h-20 w-auto object-contain">
        <span class="text-xl font-bold text-gray-800 dark:text-white tracking-wide">
          GAPS <span class="text-blue-500">Pièces Auto</span>
        </span>
      </a>
    </div>

    <!-- Navigation -->
    <div class="flex items-center gap-6">
      <a href="/" class="{{ request()->is('/') ? 'text-black' : 'text-orange-600' }} font-medium hover:text-black">Accueil</a>
      <a href="/catalogue" class="{{ request()->is('catalogue') ? 'text-black' : 'text-orange-600' }} font-medium hover:text-black">Catalogue</a>
      <a href="/encheres" class="{{ request()->is('encheres') ? 'text-black' : 'text-orange-600' }} font-medium hover:text-black">Enchères</a>
      <a href="/pieceoccassion" class="{{ request()->is('pieceoccassion') ? 'text-black' : 'text-orange-600' }} font-medium hover:text-black">Pièces Occasion</a>

      <!-- Panier -->
      <a href="/cart" class="flex items-center gap-1 font-medium text-orange-600 hover:text-black">
        <span>Panier</span>
        <span class="py-0.5 px-1.5 rounded-full text-xs bg-blue-50 border border-blue-200 text-blue-600">{{ $total_count }}</span>
      </a>

      <!-- barre de Recherche -->
      <form action="{{ route('recherche') }}" method="GET" class="relative">
        <input
        type="text"
        name="q"
        placeholder="Rechercher une pièce..."
        value="{{ request('q') }}"
        class="py-2 px-3 w-40 lg:w-60 rounded-lg border border-blue-500 
        focus:outline-none focus:ring-2 focus:ring-orange-500 text-sm text-gray-800"
      />
        <button type="submit" class="absolute right-2 top-2 text-gray-400 hover:text-orange-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
            d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
          </svg>
        </button>
      </form>

      <!-- Auth -->
      @guest
        <a href="/login" class="py-2.5 px-4 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700">
          Se connecter
        </a>
      @endguest

      @auth
      <div class="relative" x-data="{ open: false }">

        <!-- Bouton -->
        <button @click="open = !open" type="button" class="flex items-center gap-2 text-blue-500 dark:text-white font-medium hover:text-gray-500 focus:outline-none">
          {{ auth()->user()->name }}
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6" />
          </svg>
        </button>

        <!-- Dropdown -->
        <div
          x-show="open"
          @click.outside="open = false"
          x-transition
          class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50"
          style="display: none;"
        >
          <a href="/mescommandes" class="block px-4 py-2 text-sm font-bold text-gray-700 dark:text-gray-200 
          hover:bg-gray-100 dark:hover:bg-gray-700">Mes commandes</a>
          <a href="/mon-compte" class="block px-4 py-2 text-sm font-bold text-gray-700 dark:text-gray-200 
          hover:bg-gray-100 dark:hover:bg-gray-700">
            Mon compte
        </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 text-sm font-bold text-gray-700 dark:text-gray-200 
          hover:bg-gray-100 dark:hover:bg-gray-700">
              Déconnexion
            </button>
          </form>
        </div>
      </div>
      @endauth
    </div>
  </nav>
</header>
