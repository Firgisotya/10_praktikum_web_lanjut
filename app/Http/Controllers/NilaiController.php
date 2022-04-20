<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Mahasiswa_Matakuliah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Mahasiswa $mahasiswa)
    {
        $nilai = Mahasiswa_MataKuliah::where('mahasiswa_id', $mahasiswa->id)->get();
        return view('mahasiswa.nilai', [
            'mahasiswa' => $mahasiswa,
            'nilais' => $nilai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa_Matakuliah  $mahasiswa_Matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa_Matakuliah $mahasiswa_Matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa_Matakuliah  $mahasiswa_Matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa_Matakuliah $mahasiswa_Matakuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa_Matakuliah  $mahasiswa_Matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa_Matakuliah $mahasiswa_Matakuliah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa_Matakuliah  $mahasiswa_Matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa_Matakuliah $mahasiswa_Matakuliah)
    {
        //
    }

    public function cetak_pdf(Mahasiswa $mahasiswa){
        $nilai = Mahasiswa_MataKuliah::where('mahasiswa_id', $mahasiswa->id)->get();
        $pdf = PDF::loadview('mahasiswa.nilai_pdf', [
            'mahasiswa' => $mahasiswa,
            'nilais' => $nilai,
        ]);
        return $pdf->stream();
    }
}
