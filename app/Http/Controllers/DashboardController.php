<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\data_pegawai;
use App\Models\List_Advetiser;
use App\Models\List_Agency;
use App\Models\List_Brand;
use App\Models\List_Category;
use App\Models\List_Channel;
use App\Models\List_FlagRate;
use App\Models\List_Holding;
use App\Models\List_Materi;
use App\Models\List_Settings;
use App\Models\List_SpotType;
use App\Models\List_User;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{

    // list user
    public function indexListUser(Request $request) {

        if ($request->ajax()) {
            $data = List_User::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-user');
    }

    public function delete($id) {
        $post = data_pegawai::find($id);
        $post->delete();

        return redirect('/list-user');
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

// list-materi

    public function indexListMateri(Request $request) {

        if ($request->ajax()) {
            $data = List_Materi::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-materi');
    }

    // list holding

    public function indexListHolding(Request $request) {

        if ($request->ajax()) {
            $data = List_Holding::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-holding');
    }

    // list agency

    public function indexListAgency(Request $request) {

        if ($request->ajax()) {
            $data = List_Agency::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-agency');

    }

    // list advertiser

    public function indexListAdvertiser(Request $request) {

        if ($request->ajax()) {
            $data = List_Advetiser::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-agency');

    }

    // list brand

    public function indexListBrand(Request $request) {

        if ($request->ajax()) {
            $data = List_Brand::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-agency');

    }

    // list flagrate

    public function indexListFlagrate(Request $request) {

        if ($request->ajax()) {
            $data = List_FlagRate::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-flagrate');

    }

    // list spottype

    public function indexListSpottype(Request $request) {

        if ($request->ajax()) {
            $data = List_SpotType::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-spottype');

    }


    // list channel

    public function indexListChannel(Request $request) {

        if ($request->ajax()) {
            $data = List_Channel::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.channel');

    }


    // list category

    public function indexListCategory(Request $request) {

        if ($request->ajax()) {
            $data = List_Category::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.category');

    }


    // list settings

    public function indexListSettings(Request $request) {

        if ($request->ajax()) {
            $data = List_Settings::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="bg-red-100 bottom-4 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.settings');

    }

}
