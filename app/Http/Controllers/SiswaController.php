<?php

namespace App\Http\Controllers;

use App\Models\master;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = master::orderBy('id', 'asc')->paginate(5);
        return view('siswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('description', $request->description);
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ],[
            'name.required' => 'Nama Wajib Diisi!',
            'description.required' => 'Alamat Wajib Diisi!'
        ]);
        $data = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'seq' => $request->input('seq')
        ];
        siswa::create($data);
        return redirect('siswa')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = siswa::where('id', $id)->first();
        return view('siswa/show')->with('data', $data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = siswa::where('id', $id)->first();
        return view ('siswa/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ],[
            'name.required' => 'Nama Wajib Diisi!',
            'description.required' => 'Alamat Wajib Diisi!'
        ]);
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ];
        siswa::where('id', $id)->update($data);
        return redirect('/siswa')->with('success', 'Data Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::where('id', $id)->delete();
        return redirect('/siswa')->with('success', 'Data Berhasil Di Hapus!');
    }
}
