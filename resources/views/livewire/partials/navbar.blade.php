<header class="flex z-50 sticky top-0 flex-wrap md:justify-start md:flex-nowrap w-full bg-white text-sm py-3 md:py-0 dark:bg-gray-800 shadow-md">
  <nav class="max-w-[85rem] w-full mx-auto px-4 md:px-6 lg:px-8" aria-label="Global">
    <div class="flex justify-between items-center">

      <a href="/" class="flex-none text-xl font-semibold">
        <img src="https://www.ecoleauto.com/wp-content/uploads/2017/08/image001-7.jpg" alt="Logo" class="h-8">
      </a>

      <div class="flex items-center gap-6">

        <a href="/" class="{{ request()->is('/') ? 'text-black' : 'text-orange-600' }}">Accueil</a>
        <a href="/catalogue" class="{{ request()->is('catalogue') ? 'text-black' : 'text-orange-600' }}">Catalogue</a>
        <a href="/encheres" class="{{ request()->is('encheres') ? 'text-black' : 'text-orange-600' }}">Enchères</a>
        <a href="/pieceoccassion" class="{{ request()->is('pieceoccassion') ? 'text-black' : 'text-orange-600' }}">Pièces Occasion</a>

        <a href="/cart" class="flex items-center gap-1 text-orange-600">
          <span>Panier</span>
          <span class="py-0.5 px-1.5 rounded-full text-xs bg-blue-50 border border-blue-200 text-blue-600">{{ $total_count }}</span>
        </a>

        @guest
        <div class="pt-3 md:pt-0">
            <a href="/login" class="py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                Se connecter
            </a>
        </div>
        @endguest
        
        @auth
        <div class="relative group md:py-4">
            <button type="button" class="flex items-center gap-2 text-gray-700 hover:text-gray-400 font-medium">
                {{ auth()->user()->name }}
                <svg class="ms-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"/>
                </svg>
            </button>

            <div class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-lg hidden group-hover:block z-50">
                <a href="/mescommandes" class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100">Mes commandes</a>
                <a href="/profile" class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100">Mon compte</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-x-3.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 w-full text-left">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>
        @endauth

      </div>

    </div>
  </nav>
</header>
