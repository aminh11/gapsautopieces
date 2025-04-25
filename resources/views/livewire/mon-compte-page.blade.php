<div class="min-h-screen bg-gray-50 py-10 px-6">
    @if (session()->has('success'))
      <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6 shadow">
        {{ session('success') }}
      </div>
    @endif
  
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row gap-8">
      <!-- Sidebar -->
      <aside class="md:w-1/4 bg-white shadow rounded-lg p-5">
        <h2 class="text-lg font-semibold text-gray-700 mb-6">Mon Compte</h2>
        <nav class="space-y-3">
          <!-- Mon Profil -->
          <button wire:click="$set('tab', 'profil')"
                  class="w-full flex items-center gap-2 text-left px-4 py-2 rounded-lg transition {{ $tab === 'profil' ? 'bg-blue-600 text-white shadow' : 'text-gray-700 hover:bg-gray-100' }}">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            Mon Profil
          </button>
  
          <!-- Mes Commandes -->
          <button wire:click="$set('tab', 'commandes')"
                  class="w-full flex items-center gap-2 text-left px-4 py-2 rounded-lg transition {{ $tab === 'commandes' ? 'bg-blue-600 text-white shadow' : 'text-gray-700 hover:bg-gray-100' }}">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/>
            </svg>
            Mes Commandes
          </button>
  
          <!-- Déconnexion -->
          <a href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
             class="w-full flex items-center gap-2 text-left px-4 py-2 rounded-lg transition text-red-600 hover:bg-red-100">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/>
            </svg>
            Déconnexion
          </a>
  
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
          </form>
        </nav>
      </aside>
  
      <!-- Main content -->
      <section class="md:w-3/4">
        @if ($tab === 'profil')
          <h2 class="text-2xl font-bold text-gray-800 mb-6">Informations personnelles</h2>
          <form wire:submit.prevent="updateProfil" class="bg-white p-6 rounded-lg shadow space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" wire:model.defer="name"
                       class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                @error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" wire:model.defer="email"
                       class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="text-right">
              <button type="submit"
                      class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Sauvegarder
              </button>
            </div>
          </form>
        @endif
  
        @if ($tab === 'commandes')
          <h2 class="text-2xl font-bold text-gray-800 mb-6">Historique des Commandes</h2>
          @if ($commandes->count())
            <div class="overflow-x-auto bg-white p-6 rounded-lg shadow">
              <table class="w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                  <tr>
                    <th class="px-4 py-3">Commande</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Produits</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Statut</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($commandes as $commande)
                    <tr class="border-t hover:bg-gray-50">
                      <td class="px-4 py-3 font-semibold">#{{ $commande->id }}</td>
                      <td class="px-4 py-3">{{ $commande->created_at->format('Y-m-d') }}</td>
                      <td class="px-4 py-3">
                        <ul class="list-disc ml-5">
                          @foreach ($commande->items as $item)
                            <li>{{ $item->product->name ?? 'Produit inconnu' }}</li>
                          @endforeach
                        </ul>
                      </td>
                      <td class="px-4 py-3">{{ number_format($commande->grand_total, 2) }} TND</td>
                      <td class="px-4 py-3">
                        @php
                          $status = $commande->status;
                          $statusLabel = '';
                          $statusClass = '';
                          switch ($status) {
                              case 'new':
                                  $statusLabel = 'Nouvelle';
                                  $statusClass = 'bg-blue-600 text-white';
                                  break;
                              case 'processing':
                              case 'En traitement':
                                  $statusLabel = 'En traitement';
                                  $statusClass = 'bg-yellow-500 text-white';
                                  break;
                              case 'shipped':
                              case 'Expédié':
                                  $statusLabel = 'Expédiée';
                                  $statusClass = 'bg-blue-100 text-blue-800';
                                  break;
                              case 'delivered':
                              case 'Livré':
                                  $statusLabel = 'Livrée';
                                  $statusClass = 'bg-green-100 text-green-800';
                                  break;
                              case 'canceled':
                              case 'Annulée':
                                  $statusLabel = 'Annulée';
                                  $statusClass = 'bg-red-500 text-white';
                                  break;
                              default:
                                  $statusLabel = ucfirst($status);
                                  $statusClass = 'bg-gray-200 text-gray-700';
                                  break;
                          }
                        @endphp
                        <span class="px-3 py-1 rounded text-xs font-semibold {{ $statusClass }}">
                          {{ $statusLabel }}
                        </span>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <div class="bg-white p-6 rounded-lg shadow text-center text-gray-500">
              <p class="text-lg mb-2">Aucune commande trouvée.</p>
              <a href="/catalogue" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Explorer le catalogue
              </a>
            </div>
          @endif
        @endif
      </section>
    </div>
  </div>
  