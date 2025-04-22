<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="flex items-center font-poppins dark:bg-gray-800 ">
        <div class="justify-center flex-1 max-w-6xl px-4 py-4 mx-auto bg-white border rounded-md dark:border-gray-900 
        dark:bg-gray-900 md:py-10 md:px-10">
      
          <div>
            <h1 class="px-4 mb-8 text-2xl font-semibold tracking-wide text-gray-700 dark:text-gray-300 ">
              Merci. Votre commande a été reçue.
            </h1>
      
            <div class="flex border-b border-gray-200 dark:border-gray-700 items-stretch justify-start w-full h-full px-4 
            mb-8 md:flex-row xl:flex-col md:space-x-6 lg:space-x-8 xl:space-x-0">
              <div class="flex items-start justify-start flex-shrink-0">
                <div class="flex items-center justify-center w-full pb-6 space-x-4 md:justify-start">
                  <div class="flex flex-col items-start justify-start space-y-2">
                    <p class="text-lg font-semibold leading-4 text-left text-gray-800 dark:text-gray-400">
                      {{ $order->address->full_name }}</p>
                    <p class="text-sm leading-4 text-gray-600 dark:text-gray-400">{{ $order->address->street_address }}</p>
                    <p class="text-sm leading-4 text-gray-600 
                    dark:text-gray-400">{{ $order->address->city }}, {{ $order->address->state }}, {{ $order->address->zip_code }}</p>
                    <p class="text-sm leading-4 cursor-pointer dark:text-gray-400">Téléphone : {{ $order-> address->phone }}</p>
                  </div>
                </div>
              </div>
            </div>
      
            <div class="flex flex-wrap items-center pb-4 mb-10 border-b border-gray-200 dark:border-gray-700">
              <div class="w-full px-4 mb-4 md:w-1/4">
                <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400 ">
                  Numéro de commande :
                </p>
                <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">{{ $order->id }}</p>
              </div>
      
              <div class="w-full px-4 mb-4 md:w-1/4">
                <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400 ">
                  Date :
                </p>
                <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">{{ $order->created_at->format('d-m-Y') }}</p>
              </div>
      
              <div class="w-full px-4 mb-4 md:w-1/4">
                <p class="mb-2 text-sm leading-5 text-gray-800 dark:text-gray-400 ">
                  Total :
                </p>
                <p class="text-base font-semibold leading-4 text-blue-600 dark:text-gray-400">
                  {{ Number::currency($order->grand_total, 'TND') }}
                </p>
              </div>
      
              <div class="w-full px-4 mb-4 md:w-1/4">
                <p class="mb-2 text-sm leading-5 text-gray-600 dark:text-gray-400 ">
                  Méthode de paiement :
                </p>
                <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">
                  {{ $order->payment_method == 'cod' ? 'Paiement à la livraison' : '' }}
                 </p>
              </div>
            </div>
      
            <div class="px-4 mb-10">
              <div class="flex flex-col items-stretch justify-center w-full space-y-4 md:flex-row md:space-y-0 md:space-x-8">
      
                <div class="flex flex-col w-full space-y-6">
                  <h2 class="mb-2 text-xl font-semibold text-gray-700 dark:text-gray-400">Détails de la commande</h2>
      
                  <div class="flex flex-col items-center justify-center w-full pb-4 space-y-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex justify-between w-full">
                      <p class="text-base leading-4 text-gray-800 dark:text-gray-400">Sous-total</p>
                      <p class="text-base leading-4 text-gray-600 dark:text-gray-400">{{ Number::currency($order->grand_total, 'TND') }}</p>
                    </div>
      
                    <div class="flex justify-between w-full">
                      <p class="text-base leading-4 text-gray-800 dark:text-gray-400">Remise</p>
                      <p class="text-base leading-4 text-gray-600 dark:text-gray-400">{{ Number::currency(0, 'TND') }}</p>
                    </div>
      
                    <div class="flex justify-between w-full">
                      <p class="text-base leading-4 text-gray-800 dark:text-gray-400">Livraison</p>
                      <p class="text-base leading-4 text-gray-600 dark:text-gray-400">{{ Number::currency(0, 'TND') }}</p>
                    </div>
                  </div>
      
                  <div class="flex justify-between w-full">
                    <p class="text-base font-semibold leading-4 text-gray-800 dark:text-gray-400">Total</p>
                    <p class="text-base font-semibold leading-4 
                    text-gray-600 dark:text-gray-400">{{ Number::currency($order->grand_total, 'TND') }}</p>
                  </div>
                </div>
      
                <div class="flex flex-col w-full px-2 space-y-4 md:px-8">
                  <h2 class="mb-2 text-xl font-semibold text-gray-700 dark:text-gray-400">Livraison</h2>
      
                  <div class="flex items-start justify-between w-full">
                    <div class="flex items-center space-x-2">
                      <i class="fa fa-truck text-blue-600 text-2xl"></i>
                      <div class="flex flex-col">
                        <p class="text-lg font-semibold leading-6 text-gray-800 dark:text-gray-400">
                          Livraison<br><span class="text-sm font-normal">Livraison sous 24h</span>
                        </p>
                      </div>
                    </div>
                    <p class="text-lg font-semibold leading-6 text-gray-800 dark:text-gray-400">{{ Number::currency(0, 'TND') }}</p>
                  </div>
                </div>
              </div>
            </div>
      
            <div class="flex items-center justify-start gap-4 px-4 mt-6">
              <a href="/pieceoccassion" class="w-full text-center px-4 py-2 text-blue-500 border border-blue-500 rounded-md md:w-auto hover:text-white hover:bg-blue-600 dark:border-gray-700 dark:hover:bg-gray-700 dark:text-gray-300">
                Continuer mes achats
              </a>
      
              <a href="/mescommandes" class="w-full text-center px-4 py-2 bg-blue-500 rounded-md text-gray-50 md:w-auto dark:text-gray-300 hover:bg-blue-600 dark:hover:bg-gray-700 dark:bg-gray-800">
                Voir mes commandes
              </a>
            </div>
      
          </div>
        </div>
      </section>
  </div>