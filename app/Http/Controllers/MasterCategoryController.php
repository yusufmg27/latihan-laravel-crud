<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Models\master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Excel;
use Yajra\DataTables\Facades\Datatables;    
use PDF;

class MasterCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request )
    {
        if ($request->ajax()) {
            $data = master::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return view('siswa.button', compact('row'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('siswa.index');
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
        Session::flash('seq', $request->seq);
        $request->validate([
            'name' => 'required',
            'seq' => 'required'
        ],[
            'name.required' => 'Nama Harus Diisi!',
            'seq.required' => 'Sequence Harus Diisi!'
        ]);
        $data = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'seq' => $request->input('seq'),
            'created_at' => $request->input('created_at'),
            'updated_at' => $request->input('updated_at')
        ];
        master::create($data);
        return redirect('siswa')->with('success', 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = master::where('id', $id)->first();
        return view('siswa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = master::where('id', $id)->first();
        return view ('siswa/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'seq' => 'required'
        ],[
            'name.required' => 'Nama Harus Diisi!',
            'seq.required' => 'Sequence Harus Diisi!'
        ]);
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'seq' => $request->input('seq')
        ];
        master::where('id', $id)->update($data);
        return redirect('/siswa')->with('success', 'Data Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data= master::findOrFail($id);
        if ($data->status === 'active'){
            $data->status = 'inactive';
            $data->is_deleted = true;
            $data->save();
        }
        return redirect('/siswa')->with('danger', 'Data Berhasil Di Hapus!');
    }

    public function activate( $id)
    {
        $data= master::findOrFail($id);
        if ($data->status === 'inactive'){
            $data->status = 'active';
            $data->is_deleted = false;
            $data->save();
        }
        return redirect('/siswa')->with('success', 'Data Berhasil Dikembailkan!');
    }

    public function export_excel()
	{
		return Excel::download(new DataExport, 'export_excel.xlsx');
	}
    
    public function export_pdf()
    {
    	$data = master::all();
 
    	$pdf = PDF::loadview('export_pdf',['data'=>$data]);
    	return $pdf->download('export_pdf.pdf');
    }
}
