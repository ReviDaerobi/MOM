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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{

    public function TestDash() {
        return view('dashboard.test');
    }

    // list user
    public function indexListUser(Request $request) {

        if ($request->ajax()) {
            $data = List_User::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit py-2.5 px-5 rounded text-white bg-gray600 hover:bg-gray-800" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.datatables.list-user');
    }

    public function delete($id) {
        $post = List_User::find($id);
        $post->delete();

        return redirect('/list-user');
    }

    public function addData(Request $request)
    {
        $data = new List_User;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->fullname = $request->fullname;
        $data->posisi = $request->posisi;
        $data->stasiuntvid = $request->stasiun_tv;
        $data->level = $request->level;
        $data->createdBy = Auth::user()->username;
        $data->createddate = now();
        $data->userAs = $request->userAs;
        $data->agencies_commision = $request->agencies_commission;
        $data->AgenciesToBeHold = $request->agencies_to_be_hold;
        $data->AgenciesToBeHoldName = $request->agencies_to_be_hold_name;
        $data->usernameupdate = 'test';
        $data->profileLink = 'test';
        $data->save();
        return response()->json(['success' => 'Data added successfully.']);
    }

    public function updateData(Request $request, $id)
{
    $data = List_User::find($id);
    $data->username = $request->username;
    $data->fullname = $request->fullname;
    $data->stasiuntvid = $request->stasiunTv;
    $data->posisi = $request->posisi;
    $data->level = $request->level;
    $data->userAs = $request->userAs;
    $data->updatedby = Auth::user()->username;
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
                    $actionBtn = '<button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit py-5 px-3 rounded text-white bg-blue-600" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-materi');
    }

    public function deleteMateri($id) {
        $post = List_Materi::find($id);
        $post->delete();

        return redirect('/list-materi');
    }

    public function addDataMateri(Request $request)
{
    $data = new List_Materi;
    $data->brand_name = rand(2,100);
    $data->barcode = rand(2,100);;
    $data->expire_date = rand(2,100);;
    $data->created_by = rand(2,100);;
    $data->created_date = Date::now();
    $data->brand_code = rand(2,100);;
    $data->barcodeupdate = rand(2,100);;
    $data->channel = rand(2,100);;
    $data->version_name = $request->version_name;
    $data->duration = $request->duration;
    $data->type_iklan = $request->type_iklan;
    $data->save();
    return response()->json(['success'=>'Data added successfully.']);
}

    public function updateDataMateri(Request $request, $id)
{
    $data = List_Materi::find($id);
    $data->version_name = $request->version_name;
    $data->duration = $request->duration;
    $data->type_iklan = $request->type_iklan;
    $data->save();
    return response()->json(['success'=>'Data updated successfully.']);
}

    // list holding

    public function indexListHolding(Request $request) {

        if ($request->ajax()) {
            $data = List_Holding::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit py-3 px-3 rounded text-white bg-gray600" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-holding');
    }

    public function deleteHolding($id) {
        $post = List_Holding::find($id);
        $post->delete();

        return redirect('/list-holding');
    }

    public function addDataHolding(Request $request)
{
    $data = new List_Holding;
    $data->username = $request->username;
    $data->fullname = $request->fullname;
    $data->posisi = $request->posisi;
    $data->save();
    return response()->json(['success'=>'Data added successfully.']);
}

    public function updateDataHolding(Request $request, $id)
{
    $data = List_Holding::find($id);
    $data->n_holding = $request->n_holding;
    $data->description = $request->description;
    $data->createdby = $request->createdby;
    $data->save();
    return response()->json(['success'=>'Data updated successfully.']);
}

    // list Agency

    public function indexListAgency(Request $request) {

        if ($request->ajax()) {
            $data = List_Agency::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit py-3 px-3 rounded text-white bg-gray600" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-agency');

    }

    public function deleteAgency($id) {
        $post = List_Agency::find($id);
        $post->delete();

        return redirect('/list-agency');
    }

    public function addDataAgency(Request $request)
{
    $data = new List_Agency;
    $data->username = $request->username;
    $data->fullname = $request->fullname;
    $data->posisi = $request->posisi;
    $data->save();
    return response()->json(['success'=>'Data added successfully.']);
}

    public function updateDataAgency(Request $request, $id)
{
    $data = List_Agency::find($id);
    $data->agencies_name = $request->agencies_name;
    $data->agencies_address = $request->agencies_address;
    $data->npwp = $request->npwp;
    $data->save();
    return response()->json(['success'=>'Data updated successfully.']);
}

    // list Advertiser

    public function indexListAdvertiser(Request $request) {

        if ($request->ajax()) {
            $data = List_Advetiser::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit py-3 px-3 rounded text-white bg-gray600" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-agency');

    }

    public function deleteAdvertiser($id) {
        $post = List_Advetiser::find($id);
        $post->delete();

        return redirect('/list-agency');
    }

    public function addDataAdvertiser(Request $request)
{
    $data = new List_Advetiser;
    $data->username = $request->username;
    $data->fullname = $request->fullname;
    $data->posisi = $request->posisi;
    $data->save();
    return response()->json(['success'=>'Data added successfully.']);
}

    public function updateDataAdvertiser(Request $request, $id)
{
    $data = List_Advetiser::find($id);
    $data->client_name = $request->client_name;
    $data->client_address = $request->client_address;
    $data->npwp = $request->npwp;
    $data->save();
    return response()->json(['success'=>'Data updated successfully.']);
}

    // list Brand

    public function indexListBrand(Request $request) {

        if ($request->ajax()) {
            $data = List_Brand::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit py-3 px-3 rounded text-white bg-gray600" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-brand');

    }

    public function deleteBrand($id) {
        $post = List_Brand::find($id);
        $post->delete();

        return redirect('/list-brand');
    }

    public function addDataBrand(Request $request)
{
    $data = new List_Brand;
    $data->username = $request->username;
    $data->fullname = $request->fullname;
    $data->posisi = $request->posisi;
    $data->save();
    return response()->json(['success'=>'Data added successfully.']);
}

    public function updateDataBrand(Request $request, $id)
{
    $data = List_Brand::find($id);
    $data->brand_name = $request->brand_name;
    $data->clientid = $request->clientid;
    $data->product_code = $request->product_code;
    $data->save();
    return response()->json(['success'=>'Data updated successfully.']);
}

    // list Flagrate

    public function indexListFlagrate(Request $request) {

        if ($request->ajax()) {
            $data = List_FlagRate::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit py-3 px-3 rounded text-white bg-gray600" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-flagrate');

    }

    public function deleteFlagrate($id) {
        $post = List_FlagRate::find($id);
        $post->delete();

        return redirect('/list-flagrate');
    }

    public function addDataFlagrate(Request $request)
{
    $data = new List_FlagRate;
    $data->username = $request->username;
    $data->fullname = $request->fullname;
    $data->posisi = $request->posisi;
    $data->save();
    return response()->json(['success'=>'Data added successfully.']);
}

    public function updateDataFlagrate(Request $request, $id)
{
    $data = List_FlagRate::find($id);
    $data->flagrate = $request->flagrate;
    $data->description = $request->description;
    $data->flagrateupdate = $request->flagrateupdate;
    $data->save();
    return response()->json(['success'=>'Data updated successfully.']);
}

    // list Spottype

    public function indexListSpottype(Request $request) {

        if ($request->ajax()) {
            $data = List_SpotType::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit py-3 px-3 rounded text-white bg-gray600" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.list-spottype');

    }

    public function deleteSpottype($id) {
        $post = List_SpotType::find($id);
        $post->delete();

        return redirect('/list-spottype');
    }

    public function addDataSpottype(Request $request)
{
    $data = new List_SpotType;
    $data->username = $request->username;
    $data->fullname = $request->fullname;
    $data->posisi = $request->posisi;
    $data->save();
    return response()->json(['success'=>'Data added successfully.']);
}

    public function updateDataSpottype(Request $request, $id)
{
    $data = List_SpotType::find($id);
    $data->spottype = $request->usernspottypeame;
    $data->description = $request->description;
    $data->spottypeupdate = $request->spottypeupdate;
    $data->save();
    return response()->json(['success'=>'Data updated successfully.']);
}

    // list Channel

    public function indexListChannel(Request $request) {

        if ($request->ajax()) {
            $data = List_Channel::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit py-3 px-3 rounded text-white bg-gray600" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.channel');

    }

    public function deleteChannel($id) {
        $post = List_Channel::find($id);
        $post->delete();

        return redirect('/channel');
    }

    public function addDataChannel(Request $request)
{
    $data = new List_Channel;
    $data->username = $request->username;
    $data->fullname = $request->fullname;
    $data->posisi = $request->posisi;
    $data->save();
    return response()->json(['success'=>'Data added successfully.']);
}

    public function updateDataChannel(Request $request, $id)
{
    $data = List_Channel::find($id);
    $data->channelname = $request->channelname;
    $data->channelfullname = $request->channelfullname;
    $data->channelnameupdate = $request->channelnameupdate;
    $data->save();
    return response()->json(['success'=>'Data updated successfully.']);
}

    // list Category

    public function indexListCategory(Request $request) {

        if ($request->ajax()) {
            $data = List_Category::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit py-3 px-3 rounded text-white bg-gray600" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.category');

    }

    public function deleteCategory($id) {
        $post = List_Category::find($id);
        $post->delete();

        return redirect('/category');
    }

    public function addDataCategory(Request $request)
{
    $data = new List_Category;
    $data->username = $request->username;
    $data->fullname = $request->fullname;
    $data->posisi = $request->posisi;
    $data->save();
    return response()->json(['success'=>'Data added successfully.']);
}

    public function updateDataCategory(Request $request, $id)
{
    $data = List_Category::find($id);
    $data->id = $request->id;
    $data->n_kategory = $request->n_kategory;
    $data->save();
    return response()->json(['success'=>'Data updated successfully.']);
}

    // list Settings

    public function indexListSettings(Request $request) {

        if ($request->ajax()) {
            $data = List_Settings::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 show-alert-delete-box" data-id="'.$row->id.'">Delete</button> <button class="edit py-3 px-3 rounded text-white bg-gray600" data-id="'.$row->id.'">Edit</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.datatables.settings');

    }

    public function deleteSettings($id) {
        $post = List_Settings::find($id);
        $post->delete();

        return redirect('/settings');
    }

    public function addDataSettings(Request $request)
{
    $data = new List_Settings;
    $data->username = $request->username;
    $data->fullname = $request->fullname;
    $data->posisi = $request->posisi;
    $data->save();
    return response()->json(['success'=>'Data added successfully.']);
}

    public function updateDataSettings(Request $request, $id)
{
    $data = List_Settings::find($id);
    $data->discount = $request->discount;
    $data->Mode = $request->Mode;
    $data->createdby = $request->createdby;
    $data->save();
    return response()->json(['success'=>'Data updated successfully.']);
}

}
