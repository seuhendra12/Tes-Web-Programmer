<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MobilController extends Controller
{
  public function index(Request $request)
  {
    $query = Mobil::query();
    $search = $request->input('search');
    if ($search) {
      $query->where(function ($query) use ($search) {
        $query->where('merek', 'LIKE', "%$search%")
          ->orWhere('model', 'LIKE', "%$search%")
          ->orWhere('plat', 'LIKE', "%$search%")
          ->orWhere('harga_sewa', 'LIKE', "%$search%");
      });
    }

    $mobils = $query->paginate(10);
    return view('admin.data-mobil.index', compact('mobils'));
  }

  public function create()
  {
    return view('admin.data-mobil.create');
  }

  public function store(Request $request)
  {
    $mobil = $request->validate([
      'merek' => 'required',
      'model' => 'required',
      'plat' => 'required',
      'harga_sewa' => 'required',
      'gambar' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    if ($mobil['gambar']) {
      $gambar = $request->file('gambar');
      $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
      $gambar->move(public_path('img_mobil'), $namaFile);
      $mobil['gambar'] = $namaFile;
    }

    Mobil::create($mobil);

    Session::flash('success', 'Mobil berhasil ditambahkan');
    return redirect('/mobil');
  }

  public function edit($id)
  {
    $mobil = Mobil::findOrFail($id);
    return view('admin.data-mobil.edit', compact('mobil'));
  }

  public function update(Request $request, $id)
  {
    $mobil = Mobil::findOrFail($id);
    $validate = $request->validate([
      'merek' => 'required',
      'model' => 'required',
      'plat' => 'required',
      'harga_sewa' => 'required',
      'gambar' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    if ($validate['gambar']) {
      $gambar = $request->file('gambar');
      $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
      $gambar->move(public_path('img_mobil'), $namaFile);
      $validate['gambar'] = $namaFile;
    }

    $mobil->update($validate);

    Session::flash('success', 'Mobil berhasil diubah');
    return redirect('/mobil');
  }

  public function destroy(string $id)
  {
    $mobil = Mobil::findOrFail($id);
    $mobil->delete();
    Session::flash('success', 'Mobil berhasil dihapus');
    return redirect('/mobil');
  }
}
