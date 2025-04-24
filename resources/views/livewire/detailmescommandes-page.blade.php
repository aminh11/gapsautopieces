<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <h1 class="text-4xl font-bold text-slate-500">Détails de la commande</h1>

  <!-- Grid -->
  <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mt-5">
    <!-- Client -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-gray-600 dark:text-gray-400" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
          </svg>
          
        </div>
        <div class="grow">
          <p class="text-xs uppercase tracking-wide text-gray-500">Client</p>
          <div class="mt-1 flex items-center gap-x-2">
            <div>{{ $address->full_name }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Date commande -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-gray-600 dark:text-gray-400" fill="none" 
          viewBox="0 0 24 24" stroke="currentColor">
            <path d="M8 7V3M16 7V3M4 11h16M3 5h18a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z"/>
          </svg>
          
        </div>
        <div class="grow">
          <p class="text-xs uppercase tracking-wide text-gray-500">Date commande</p>
          <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">{{ $order_items[0]->created_at->format('d-m-Y') }}</h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Statut commande -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-gray-600 dark:text-gray-400" fill="none" 
          viewBox="0 0 24 24" stroke="currentColor">
            <path d="M9 12l2 2l4 -4"/>
            <circle cx="12" cy="12" r="10"/>
          </svg>
          
        </div>
        <div class="grow">
          <p class="text-xs uppercase tracking-wide text-gray-500">Statut</p>
          <div class="mt-1 flex items-center gap-x-2">
            @php
              $status = '';
              if ($order->status == 'new') {
                        $status = '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow">Nouvelle</span>';
                    }
                    if ($order->status == 'processing') {
                        $status = '<span class="bg-yellow-500 py-1 px-3 rounded text-white shadow">Traitement</span>';
                    }
                    if ($order->status == 'shipped') {
                        $status = '<span class="bg-green-500 py-1 px-3 rounded text-white shadow">Expédiée</span>';
                    }
                    if ($order->status == 'delivered') {
                        $status = '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow">Livrée</span>';
                    }
                    if ($order->status == 'canceled') {
                        $status = '<span class="bg-red-500 py-1 px-3 rounded text-white shadow">Annulée</span>';
                    }
            @endphp
           {!! $status !!}
          </div>
        </div>
      </div>
    </div>

    <!-- Statut paiement -->
    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
      <div class="p-4 md:p-5 flex gap-x-4">
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-gray-600 dark:text-gray-400" fill="none" 
          viewBox="0 0 24 24" stroke="currentColor">
            <path d="M21 8H3V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
            <rect x="3" y="8" width="18" height="13" rx="2"/>
          </svg>
          
        </div>
        <div class="grow">
          <p class="text-xs uppercase tracking-wide text-gray-500">Statut de paiement</p>
          <div class="mt-1 flex items-center gap-x-2">
            @php
            $payment_status = '';
              if($order->payment_status == 'pending'){
                $payment_status = '<span class="bg-yellow-500 py-1 px-3 rounded text-white shadow"> En attente </span>';
                } 
              if($order->payment_status == 'paid'){
                $payment_status = '<span class="bg-green-500 py-1 px-3 rounded text-white shadow"> Payée </span>';
                }
              if($order->payment_status == 'failed'){
                $payment_status = '<span class="bg-red-500 py-1 px-3 rounded text-white shadow"> Échouée </span>';
                }
            @endphp
            {!! $payment_status !!}

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin Grid -->

  <!-- Produits -->
  <div class="flex flex-col md:flex-row gap-4 mt-4">
    <div class="md:w-3/4">
      <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
        <table class="w-full">
          <thead>
            <tr>
              <th class="text-left font-semibold">Produit</th>
              <th class="text-left font-semibold">Prix</th>
              <th class="text-left font-semibold">Quantité</th>
              <th class="text-left font-semibold">Total</th>
            </tr>
          </thead>
          <tbody>
             
            @foreach ($order_items as $item)
            <tr wire:key="{{ $item->id }}">
              <td class="py-4">
                <div class="flex items-center">
                  <img class="h-16 w-16 mr-4" src="{{ url('storage', $item->product->images[0]) }}" alt="{{ $item->product->name }}">
                  <span class="font-semibold">{{ $item->product->name }}</span>
                </div>
              </td>
              <td class="py-4">{{ Number::currency($item->unit_amount, 'TND') }}</td>
              <td class="py-4"><span class="text-center w-8">{{ $item->quantity }}</span></td>
              <td class="py-4">{{ Number::currency($item->total_amount, 'TND') }}</td>
            </tr>  
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Adresse -->
      <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
        <h1 class="font-3xl font-bold text-slate-500 mb-3">Adresse de livraison</h1>
        <div class="flex justify-between items-center">
          <div>
            <p>{{ $address->street_address }}, {{ $address->city }}, {{ $address->state }}, {{ $address->zip_code }}</p>
          </div>
          <div>
            <p class="font-semibold">Téléphone :</p>
            <p>{{ $address->phone }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Résumé -->
    <div class="md:w-1/4">
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-lg font-semibold mb-4">Résumé</h2>
        <div class="flex justify-between mb-2">
          <span>Sous-total</span>
          <span>{{ Number::currency($item->order->grand_total, 'TND') }}</span>
        </div>
        <div class="flex justify-between mb-2">
          <span>Taxes</span>
          <span>TND 0.00</span>
        </div>
        <div class="flex justify-between mb-2">
          <span>Livraison</span>
          <span>TND 0.00</span>
        </div>
        <hr class="my-2">
        <div class="flex justify-between mb-2">
          <span class="font-semibold">Total général</span>
          <span class="font-semibold">{{ Number::currency($item->order->grand_total, 'TND') }}</span>
        </div>
      </div>
    </div>
  </div>
</div>
