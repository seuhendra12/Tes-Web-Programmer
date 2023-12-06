<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
  public function index(Request $request)
  {
    $query = Mobil::query();
    $mobil = $request->input('mobil');
    if ($mobil) {
      $query->where(function ($query) use ($mobil) {
        $query->where('merek', 'LIKE', "%$mobil%");
      });
    }

    $mobils = $query->paginate(10);
    return view('user.index', compact('mobils'));
  }

  public function peminjaman($id)
  {
    $mobil = Mobil::findOrFail($id);
    return view('user.peminjaman', compact('mobil'));
  }

  public function konfirmasiPeminjaman(Request $request)
  {
    $user = Auth::user();
    $request->validate([
      'mobil_id' => 'required',
      'tanggal_mulai' => 'required',
      'total_harga' => 'required',
    ]);

    $peminjaman = new Peminjaman();
    $peminjaman->mobil_id = $request->input('mobil_id');
    $peminjaman->user_id = $user->id;
    $peminjaman->tanggal_mulai = $request->input('tanggal_mulai');
    $peminjaman->tanggal_selesai = $request->input('tanggal_mulai');
    $peminjaman->total_harga = $request->input('total_harga');
    $peminjaman->status = 1;
    $peminjaman->save();

    Session::flash('success', 'Transaksi berhasil');
    return redirect('/');
  }

  public function history($id) {
    $historis = Peminjaman::where('user_id',$id)->get();

    return view('user.history', compact('historis'));
  }
}
