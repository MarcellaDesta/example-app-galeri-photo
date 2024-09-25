<x-app-layout>
    <title>Edit {{ $post->title }} {{ config('app.name') }}</title>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Start Form Edit Galeri Photo -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal body -->
                        <form
                            method="POST"
                            action="{{ route('admin-edit-galeri-photo', $post->id) }}"
                            enctype="multipart/form-data"
                            class="p-4 md:p-5">
                            @csrf
                            @method('PUT') <!-- If using PUT method for update -->
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Name Album
                                    </label>
                                    <input
                                        type="text"
                                        name="title"
                                        id="title"
                                        value="{{ old('title', $post->title) }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Masukkan Nama Album">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="images" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Gambar
                                    </label>
                                    <input
                                        name="images[]"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        id="multiple_files"
                                        type="file"
                                        multiple>
                                    <!-- Optionally display existing images -->
                                    @if($post->images)
                                        <div class="mt-2">
                                            @foreach($post->images as $image)
                                                <img src="{{ asset('storage/' . $image) }}" alt="Album Image" class="w-20 h-20 object-cover">
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Kategory
                                    </label>
                                    <select id="category"
                                        name="category"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                        <option>Select category</option>
                                        @foreach ($listCategory as $key => $value)
                                            <option value="{{ $value }}" {{ $post->category_id == $value ? 'selected' : '' }}>
                                                {{ $key }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Keterangan Album
                                    </label>
                                    <textarea id="description"
                                        rows="4"
                                        name="description"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Enter album description">{{ old('description', $post->description) }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Update Album
                            </button>
                        </form>
                    </div>
                    <!-- End Form Edit Galeri Photo -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
