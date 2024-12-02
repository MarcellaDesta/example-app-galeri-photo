<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class NewsPortalController extends Controller
{
    public function  index()
    {
        // mengirim data ke halaman  newsPortal
         return view('admin.newsportals.index', [
            'pageTitle'   => 'News Portal',
            'newsportals' => Post::with('contents')->get()
         ]);
    }

    public function create()
    {
        // mengirim data ke halaman  newsPortal
        return view('admin.newsportals.create', [
            'pageTitle'   => 'Form News Portal'
            // 'newsportals' => Post::with('contents')->get()
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
