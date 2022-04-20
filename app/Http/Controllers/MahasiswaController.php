<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::with('kelas')->get();
        $paginate = Mahasiswa::orderBy('id', 'asc');
        $search = Mahasiswa::all();
        if (request('search')) {
            $paginate->where('nama', 'like', '%' . request('search') . '%')
                ->orWhere('nim', 'like', '%' . request('search') . '%');
        }
        return view('mahasiswa.index', [
            'mahasiswa' => $mahasiswa,
            'paginate' => $paginate->paginate(3),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create', [
            'kelas' => Kelas::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'kelas_id' => 'required',
            'Jurusan' => 'required',
            'No_Handphone' => 'required',
            'foto' => 'image|file'
        ]);
        // $mahasiswa = new Mahasiswa;
        // $mahasiswa->nim = $request->get('nim');
        // $mahasiswa->nama = $request->get('nama');
        // $mahasiswa->jurusan = $request->get('jurusan');
        // $mahasiswa->save();

        // $kelas = new Kelas;
        // $kelas->id_kelas = $request->get('kelas');

        // //fungsi eloquent untuk menambah data dengan relasi belongsTo
        // $mahasiswa->kelas()->associate($kelas);
        // $mahasiswa->save();

        if($request->file('foto')){
            $validateData['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Mahasiswa::create($validateData);
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $Mahasiswa = $mahasiswa;
        return view('mahasiswa.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $kelas = Kelas::all();
        $Mahasiswa = $mahasiswa;
        return view('mahasiswa.edit', compact('Mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validateData = $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'kelas_id' => 'required',
            'Jurusan' => 'required',
            'foto' => 'image|file|max:1024'
        ]);
        if($request->file('foto')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['foto'] = $request->file('foto')->store('foto', 'public');
        }
        Mahasiswa::where('id', $mahasiswa->id)->update($validateData);
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        Mahasiswa::where('id', $mahasiswa->id)->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
    }

}
