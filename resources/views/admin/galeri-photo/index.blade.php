<x-app-layout>
<title> {{ $pageTitle }} | {{ config('app.name') }} </title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   {{--  {{ __("Halo, kamu berada pada halaman Galeri Photo") }} --}}
                 {{--   @foreach ($listPost as $item)
                      <ul> {{$item ['title'] }} </ul>
                   @endforeach --}}
                   {{-- {{ $listPost ['title'] }} --}}

                   {{--Start Tombol Tambah --}}
                   <div class="flex item-center gap-4">
                      <button
                            type="button"
                            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <a href="{{ route('admin-create-galeri-photo')}}">
                                    Tambah Galeri Photo
                                </a>
                       </button>
                    @if (session('status') === 'deleted-successfuly')
                        {{-- <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Berhasil dihapus...') }}</p> --}}
                        <div
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                        class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                              <span class="font-medium">Berhasil dihapus!!</span>
                            </div>
                          </div>
                    @endif
                   </div>
                   {{-- End Tombol Tambah --}}

                   {{-- start display data posts --}}
                   {{-- @forelse ($listPost as $post) --}}

<div class="mt-3 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Album
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Gambar
                </th>
                {{-- <th scope="col" class="px-6 py-3">
                    Category
                </th> --}}


                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listPost as $post)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $post->title }}
                </th>
                <td class="px-6 py-4">
                    {{ $post->description }}
                </td>
                <td class="px-6 py-4">
                    @if (count ($post->images ) > 0 )
                        Gambar({{ count($post->images) }})

                    @else
                        Gambar(0)

                    @endif
                    {{-- <img
                         src="{{ asset('storage/' . $post->iamges->path)  }}"
                        alt =""> --}}


                        {{-- @foreach ($post->images as $image)
                        <div  class="inline-flex gap-2">
                            <img  src="{{ asset('storage/' . $image->path) }}"
                                class="w-12 border roundede-sm"
                                     alt="">
                        </div>
                        {{-- {{ $image->path }} --}}
                        {{-- @endforeach --}}
                </td>
                {{-- <td class="px-6 py-4">
                    {{ $post->category }}
                </td> --}}
                <td class="px-6 py-4 text-right flex gap-2">
                    <a
                    href="{{ route('admin-edit-galeri-photo', [$post->slug]) }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    Edit
                    </a>
                    <a
                    href="{{ route('admin-show-galeri-photo', [$post->slug]) }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    View
                    </a>
                    <form method="POST" action="{{ route('admin-delete-album', $post) }}">
                        @csrf
                        @method('delete')
                        <a
                            href="route('admin-delete-album', $post)"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline"
                            onclick="event.preventDefault(); if(confirm('yakin untuk menghapus?')) this.closest('form').submit();">
                            {{ __('Delete') }}
                        </a>
                    </form>
                </td>
            </tr>
            @empty
            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                 role="alert">
                <span class="font-medium">Data Galeri Photo Belum Adaaaa...!</span>
            </div>
            @endforelse
        </tbody>
    </table>
</div>
                   {{-- end display data posts --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
