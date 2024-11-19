<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12"  id="vue-app">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("Halo, ini halaman create news-portal") }} --}}

                    <!-- Modal body -->
                        <form class="p-4 md:p-5">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name"
                                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Name
                                        </label>

                                    <input type="text"
                                            name="name"
                                            id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                    <input type="number"
                                            name="price"
                                            id="price"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                    <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select category</option>
                                        <option value="TV">TV/Monitors</option>
                                        <option value="PC">PC</option>
                                        <option value="GA">Gaming/Console</option>
                                        <option value="PH">Phones</option>
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Description</label>
                                    <textarea
                                            id="description"
                                            rows="4"
                                            name="descriptions[]"
                                            v-model="x"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here">
                                    </textarea>
                                </div>
                            </div>
                            <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5"
                                     fill="currentColor"
                                     viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg"><path
                                     fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                News Portal
                            </button>
                        </form>
                </div>
            </div>
        </div>
    </div>

        <script type="module">
        import { createApp, ref, watch, onMounted } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

        createApp({
          setup() {
            const message = ref('Hello Gengs!');
            const x = ref('')

            watch(x, (newX) => {
                    console.log(`x is ${newX}`)
                    });

            // deklarasi objek items
            const items = ref({
                description:''
                });

            return {
              message,
              items,
              x,
            }
          }
        }).mount('#vue-app')
      </script>

</x-app-layout>