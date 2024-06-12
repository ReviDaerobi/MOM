<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\data_pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $datas = data_pegawai::all();
        return view('dashboard.index',compact('datas'));
    }

}
