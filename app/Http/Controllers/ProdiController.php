<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Prodi;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{

    public function index()
    {
        return view('prodi.index');
    }

    public function create()
    {
        $list_prodi = Prodi::all();
        return view('prodi.create', compact('list_prodi'));
    }

    public function edit($kode_prodi)
    {
        $prodi = Prodi::findOrFail($kode_prodi);

        return view('prodi.edit', compact('prodi'));
    }

    public function update(Request $request, Prodi $kode_prodi)
    {
        $request->validate([
        'nama_prodi' => 'required',
        'kode_prodi' => 'required',
        'kaprodi' => 'required',
        ]);

        $kode_prodi->update($request->all());

        return redirect()->route('prodi.index')
                        ->with('success','Data berhasil ubah');
    }

    public function store(Request $request)
    {
    $request->validate([
        'kode_prodi' => 'required',
        'nama_prodi' => 'required',
        'kaprodi' => 'required'
    ]);

    Prodi::create($request->all());

    return redirect()->route('prodi.index')->with('success','Data berhasil ditambahkan');
    }
    

    public function prodi_list()
    {
        $prodi = Prodi::get();
        return Datatables::of($prodi)
            ->addIndexColumn()
            ->addColumn('action', function ($prodi){
                $action = '<a class="text-primary" href="/prodi/edit/'.$prodi->kode_prodi.'">Edit</a>';
                    
                $action .= ' | <a class="text-danger" href="/prodi/delete/'.$prodi->kode_prodi.'">Hapus</a>';
            return $action;
                
            })
            ->make();
    }

    public function destroy($kode_prodi)
    {
        $prodi = Prodi::findOrFail($kode_prodi);

        $prodi->delete();

        return view('prodi.index')->with('success', 'Berhasil dihapus');
    }
}




