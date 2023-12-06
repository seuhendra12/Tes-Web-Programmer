<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        $search = $request->input('search');
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('no_sim', 'LIKE', "%$search%")
                    ->orWhere('nama', 'LIKE', "%$search%")
                    ->orWhere('no_telp', 'LIKE', "%$search%")
                    ->orWhere('alamat', 'LIKE', "%$search%");
            });
        }

        $penggunas = $query->where('role','<>','admin')->orderBy('nama')->paginate(10);
        return view('admin.data-pengguna.index', compact('penggunas'));
    }

    public function create()
    {
        return view('admin.data-pengguna.create');
    }

    public function store(Request $request)
    {
        $pengguna = $request->validate([
            'no_sim' => 'required|unique:users',
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ]
        ]);
        User::create($pengguna);

        Session::flash('success', 'Pengguna berhasil ditambahkan');
        return redirect('/pengguna');

    }

    public function edit($id)
    {
        $pengguna = User::findOrFail($id);
        return view('admin.data-pengguna.edit',compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $pengguna = User::findOrFail($id);
        $validate = $request->validate([
            'no_sim' => "required|unique:users,no_sim,$id",
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
        $pengguna->update($validate);
        Session::flash('success', 'Pengguna berhasil diubah');
        return redirect('/pengguna');

    }

    public function destroy(string $id)
    {
        $pengguna = User::findOrFail($id);
        $pengguna->delete();
        Session::flash('success', 'Pengguna berhasil dihapus');
        return redirect('/pengguna');

    }
}
