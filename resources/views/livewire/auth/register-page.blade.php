<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <div class="flex h-full items-center">
      <main class="w-full max-w-md mx-auto p-6">
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
              <div class="p-4 sm:p-7">
                  <div class="text-center">
                      <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">S'inscrire</h1>
                      <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                          Vous avez déjà un compte ?
                          <a wire.navigate href="/login" class="text-blue-600 hover:underline font-medium">Se connecter</a>
                      </p>
                  </div>

                  <hr class="my-5 border-slate-300">

                  <form wire:submit.prevent="save">
                      <div class="grid gap-y-4">

                          <!-- Nom -->
                          <div>
                              <label for="name" class="block text-sm mb-2 dark:text-white">Nom</label>
                              <div class="relative">
                                  <input type="text" id="name" wire:model="name"
                                      class="py-3 px-4 block w-full border rounded-lg text-sm
                                      focus:border-blue-500 focus:ring-blue-500
                                      @error('name') border-red-500 @enderror">

                                  @error('name')
                                      <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                                          <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 16 16">
                                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                          </svg>
                                      </div>
                                  @enderror
                              </div>
                              @error('name')
                                  <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                              @enderror
                          </div>

                          <!-- Email -->
                          <div>
                              <label for="email" class="block text-sm mb-2 dark:text-white">Adresse e-mail</label>
                              <div class="relative">
                                  <input type="email" id="email" wire:model="email"
                                      class="py-3 px-4 block w-full border rounded-lg text-sm
                                      focus:border-blue-500 focus:ring-blue-500
                                      @error('email') border-red-500 @enderror">

                                  @error('email')
                                      <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                                          <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 16 16">
                                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                          </svg>
                                      </div>
                                  @enderror
                              </div>
                              @error('email')
                                  <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                              @enderror
                          </div>

                          <!-- Password -->
                          <div>
                              <label for="password" class="block text-sm mb-2 dark:text-white">Mot de passe</label>
                              <div class="relative">
                                  <input type="password" id="password" wire:model="password"
                                      class="py-3 px-4 block w-full border rounded-lg text-sm
                                      focus:border-blue-500 focus:ring-blue-500
                                      @error('password') border-red-500 @enderror">

                                  @error('password')
                                      <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                                          <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 16 16">
                                              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                          </svg>
                                      </div>
                                  @enderror
                              </div>
                              @error('password')
                                  <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                              @enderror
                          </div>

                          <!-- Submit Button -->
                          <button type="submit"
                              class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                S'inscrire
                          </button>

                      </div>
                  </form>

              </div>
          </div>
      </main>
  </div>
</div>
