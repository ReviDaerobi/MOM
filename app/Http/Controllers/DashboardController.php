<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\data_pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $data = data_pegawai::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.index');
    }

    public function delete($id) {
        $post = data_pegawai::find($id);
        $post->delete();

        return redirect('/dashboard');
    }

    public function addData(Request $request)
{
    $data = new data_pegawai;
    $data->nama = $request->nama;
    $data->alamat = $request->alamat;
    $data->telepon = $request->telepon;
    $data->save();
    return response()->json(['success'=>'Data added successfully.']);
}

    public function updateData(Request $request, $id)
{
    $data = data_pegawai::find($id);
    $data->nama = $request->nama;
    $data->alamat = $request->alamat;
    $data->telepon = $request->telepon;
    $data->save();
    return response()->json(['success'=>'Data updated successfully.']);
}
}
