<x-layouts.app :title="'Résultats de recherche'">
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-orange-600 mb-6">Résultats pour : "{{ $query }}"</h1>

        @if($resultats->isEmpty())
            <p class="text-gray-500">Aucun résultat trouvé.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($resultats as $product)
                    <div class="bg-white border rounded-lg shadow-md overflow-hidden">
                        {{-- Image principale --}}
                        @if($product->images && is_array($product->images) && count($product->images) > 0)
                            <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}"
                                 class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                                Pas d'image
                            </div>
                        @endif

                        {{-- Détails du produit --}}
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 mb-1">
                                {{ $product->name }}
                            </h2>

                            <p class="text-sm text-gray-600 mb-2">
                                {{ Str::limit($product->description, 100) }}
                            </p>

                            <p class="text-sm font-bold text-green-600 mb-2">
                                {{ number_format($product->price, 2) }} TND
                            </p>

                            <a href="/pieceoccassion/{{ $product->slug }}"
                               class="inline-block text-sm text-blue-600 hover:underline font-medium">
                                Voir la pièce
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.app>
