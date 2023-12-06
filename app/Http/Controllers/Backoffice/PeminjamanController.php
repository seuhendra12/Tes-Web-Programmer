<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PeminjamanController extends Controller
{
  public function index(Request $request)
  {
    $query = Peminjaman::query();
    $search = $request->input('search');
    if ($search) {
      $query->where(function ($query) use ($search) {
        $query->WhereHas('user', function ($query) use ($search) {
          $query->where('nama', 'LIKE', "%$search%");
        });
      });
    }

    $peminjamans = $query->paginate(10);
    return view('admin.data-peminjaman.index', compact('peminjamans'));
  }

  public function edit(string $id)
  {
    $peminjaman = Peminjaman::findOrFail($id);
    return view ('admin.data-peminjaman.edit', compact('peminjaman'));
  }

  public function update(Request $request, string $id)
  {
    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->update([
      'status' => $request->input('status')
    ]);
    Session::flash('success', 'Status berhasil diubah');
    return redirect('/peminjaman');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->delete();
    Session::flash('success', 'Data Peminjaman berhasil dihapus');
    return redirect('/peminjaman');
  }
}
