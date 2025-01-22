<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\On;

class ListAlbum extends Component
{
    public $listAlbum= [];

    public function mount()
    {
        $this->getAllListAlbum();
    }

    public function render()
    {
        return view('livewire.list-album');
    }

    // function mengambil semua data posts
    #[On('refresh-album')]
    public function getAllListAlbum()
    {
        // query mengambil data dari tabel posts
        // dd('fungsi ini sudah ke trigger');
        $this->listAlbum = Post::with(['images', 'likes'])->get();
        dd($this->listAlbum);
    }
}
