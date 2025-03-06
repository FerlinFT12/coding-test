<?php

namespace App\Http\Controllers;

use App\Models\Karakter;
use App\Models\KarakterPersis;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KarakterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Pengecekan Persen Karakter';
        return view('karakter.form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Pengecekan Persen Karakter';
        return view('karakter.form');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karakter $karakter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karakter $karakter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karakter $karakter)
    {
        //
    }

    public function cekPersenKarakter(Request $request)
    {
        $input_1 = $request->input_1;
        $input_2 = $request->input_2;
        $hitung_sesuai = new KarakterPersis();
        $data['persentase'] = $hitung_sesuai->hitungPersentase($input_1, $input_2);

        $model = new KarakterPersis();
        $model->input_1 = $input_1;
        $model->input_2 = $input_2;
        $model->persentase_karakter = $data['persentase'];
        $model->save();

        return redirect()->route('karakter.list')->with('alert.success', 'Berhasil Menghitung Persentase Karakter');
    }

    public function list() {
        $data['title'] = 'Pengecekan Persen Karakter';
        return view('karakter.list');
    }

    public function datatable(Request $request)
    {
        $query = Karakter::query();
        return DataTables::of($query)
            ->editColumn('persentase_karakter', function($model) {
                return $model->persentase_karakter.' %';
            })
            ->addColumn('action', function ($model) {
                $string = '<div class="btn-group">';
                // $string .= '<a href="' . route('employee.edit', ['id' => base64_encode($model->id)]) . '" type="button"  class="btn btn-sm btn-info" title="Edit Employee"><i class="fas fa-edit"></i></a>';
                // $string .= '&nbsp;&nbsp;<a href="' . route('employee.destroy', ['id' => base64_encode($model->id)]) . '" type="button" class="btn btn-sm btn-danger btn-delete" title="Remove"><i class="fa fa-trash"></i></a>';
                $string .= '</div>';
                return $string;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
