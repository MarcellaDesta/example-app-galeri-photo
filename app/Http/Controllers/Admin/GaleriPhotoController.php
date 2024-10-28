<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use App\Helpers\Category;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class GaleriPhotoController extends Controller
{
    public function index()
    {
           /* dd(Post::all()); */
          /*  $listPost = Post::all(); */
         // menampilkan isi data post dan images
        // Post::all();
       // elouquent
      //    $post = Post::with('images')->get();
     //    dd ($post);

        return view('admin.galeri-photo.index',[
            'pageTitle' => 'Galeri-photo',
            'listPost'  => Post::with('images')->get(),
        ]);
    }

    public function create()
    {
     /*    dd(Category::categories); */
        return view('admin.galeri-photo.create',[
            'pageTitle'    => 'Create Galeri',
            'listCategory' => Category::categories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       =>'required',
            'category'    =>'required',
            'description' =>'required',
            'images'      =>'required',
            'images.*'    =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ],[
            'title.required'        =>'Judul wajib di isi......',
            'description.required'  =>'Keterangan wajib di isi.....',
            'images.required'       =>'Photo Album Galeri Photo Wajib Diisi....'

        ]);

        // dd($validated);

        $post = Post::create([
            'title'         =>$validated['title'],
            'category'      =>$validated['category'],
            'description'   =>$validated['description'],
            'slug'          =>Str::slug($validated['title']),
            'user_id'       =>Auth::user()->id

        ]);

        if ($validated['images']){
            foreach($request->file('images') as $file){
                if ($file->isValid()) {

                // mengambil nama original
                $originalName = $file->getClientOriginalName();

                // penambahan time dan untuk membuat unik
                $uniqueName = time() . '_' . $originalName;

                // menggunakan store membuat nama file unik
                // $path = $file->store('images', 'public');

                // menyimpan data dengan nama original
                $path = $file->storeAs('images', $uniqueName, 'public');

                Image::create([
                    'name'     =>$originalName,
                    'post_id'  => $post->id,
                    'path'     => $path
                ]);
                }
            }
        }
        return redirect(route('admin-galeri-photo', absolute: false));
       /*  dd($post);
        return redirect(); */
    }

    public function edit(string $slug)
    {
        $post = Post::with('images')->where('slug', $slug)->first();
        // dd($slug);
        // $post = Post::findOrfail($postId);

        // // mengembalikan ke halaman viewe admin-edit
        return view('admin.galeri-photo.edit',[
            'pageTitle'    => 'Edit Album',
            'post'         => $post,
            'images'       => $post->images ?? '',
            'listCategory' => Category::categories
        ]);
        // dd('mau edit galeri photo', $post);
    }

    public function updateGaleri(Request $request, Post $post)
    {

        // Logika untuk update
        $validated = $request->validate([
            'title'       =>'required',
            'category'    =>'required',
            'description' =>'required',
            'images'      =>'nullable',
            'images.*'    =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ],[
            'title.required'        =>'Judul wajib di isi......',
            'description.required'  =>'Keterangan wajib di isi.....'
        ]);

        $post->update([
            'title'         =>$validated['title'],
            'category'      =>$validated['category'],
            'description'   =>$validated['description'],
            'slug'          =>Str::slug($validated['title']),
            'user_id'       =>Auth::user()->id

        ]);
        // dd($post);
        if ($request->hasFile('images')) {
            dd('ada gambar cuyy..');
        } else {
            dd('update berhasil namun tidak ada gambar baruy..');
        }
    }
}
