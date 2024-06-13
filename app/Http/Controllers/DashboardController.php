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
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="{{ $id }}">Delete</button> <button class="button-edit bg-gray-600 bottom-4"  data-id="{{ $id }}">edit</button>';
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
