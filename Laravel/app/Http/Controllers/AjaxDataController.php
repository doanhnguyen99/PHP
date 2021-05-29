<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use Yajra\DataTables\DataTables;

class AjaxDataController extends Controller
{
    function index()
    {
        return view('student.ajaxdata');
    }

    function getdata()
    {
        $people = People::select('first_name', 'last_name');
        return Datatables::of($people)->make(true);
    }
}
