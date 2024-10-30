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
                   <button
                   type="button"
                   class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <a href="{{ route('admin-create-galeri-photo')}}">
                        Tambah Galeri Photo
                    </a>
                </button>
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
                <td class="px-6 py-4 text-right">
                    <a
                    href="{{ route('admin-edit-galeri-photo', [$post->slug]) }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    Edit
                </a>
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
