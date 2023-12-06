<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
  public function index(Request $request)
  {
    $query = Peminjaman::query();
    $search = $request->input('search');
    if ($search) {
      $query->where(function ($query) use ($search) {
        $query->where('merek', 'LIKE', "%$search%")
          ->orWhere('model', 'LIKE', "%$search%")
          ->orWhere('plat', 'LIKE', "%$search%")
          ->orWhere('harga_sewa', 'LIKE', "%$search%");
      });
    }

    $peminjamans = $query->paginate(10);
    return view('admin.data-peminjaman.index', compact('peminjamans'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
