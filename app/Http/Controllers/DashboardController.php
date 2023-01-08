<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function menu()
    {
        $menus = Menu::all();
        return view('admin.pages.menu', compact('menus'));
    }
    public function tambahMenu(Request $request)
    {
        // Tambah Menu Dengan Gambar
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',

        ]);

        $imageName = time() . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('images'), $imageName);

        Menu::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $imageName,
        ]);

        return redirect()->back()->with('tambah-menu', 'Menu berhasil ditambahkan');
    }
}
