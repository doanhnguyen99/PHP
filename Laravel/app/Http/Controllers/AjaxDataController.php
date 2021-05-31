<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

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

    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name'  => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            if($request->get('button_action') == "insert")
            {
                $people = new People([
                    'first_name'    =>  $request->get('first_name'),
                    'last_name'     =>  $request->get('last_name')
                ]);
                $people->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }
}
