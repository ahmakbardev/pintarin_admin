<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        return view('dosen.index', compact('dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:dosens',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        try {
            $dosen = Dosen::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'password' => Hash::make('dosen123'),
            ]);
            return response()->json(['success' => 'Dosen berhasil ditambahkan', 'dosen' => $dosen]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan dosen'], 500);
        }
    }

    public function show(Dosen $dosen)
    {
        return response()->json($dosen);
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        try {
            $dosen->update($request->all());
            return response()->json(['success' => 'Dosen berhasil diupdate', 'dosen' => $dosen]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal mengupdate dosen'], 500);
        }
    }

    public function destroy(Dosen $dosen)
    {
        try {
            $dosen->delete();
            return response()->json(['success' => 'Dosen berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus dosen'], 500);
        }
    }
}
