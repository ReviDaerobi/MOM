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
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
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

}
