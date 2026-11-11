<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();

        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'nik' => 'required|string|max:30|unique:pelanggan,nik',
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email|max:100',
            'alamat' => 'required|string',
            'no_sim' => 'required|string|max:30',
        ]);

        Pelanggan::create($request->only([
            'nama_lengkap',
            'nik',
            'no_hp',
            'email',
            'alamat',
            'no_sim',
        ]));

        return redirect('/pelanggan')
            ->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Pelanggan::findOrFail($id);

        return view('pelanggan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'alamat' => 'required|string',
            'no_sim' => 'required|string|max:30',
        ]);

        $data = Pelanggan::findOrFail($id);

        $data->update($request->only([
            'nama_lengkap',
            'no_hp',
            'email',
            'alamat',
            'no_sim',
        ]));

        return redirect('/pelanggan')
            ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Pelanggan::findOrFail($id);

        $data->delete();

        return redirect('/pelanggan')
            ->with('success', 'Data pelanggan berhasil dihapus.');
    }
}