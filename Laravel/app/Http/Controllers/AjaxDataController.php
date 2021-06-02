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
        $people = People::select('id', 'first_name', 'last_name');
        return Datatables::of($people)
            ->addColumn('action', function($people){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$people->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger delete" id="'.$people->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';

            })
            ->make(true);
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
        } else
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

            if($request->get('button_action') == "update"){
                $people = People::find($request->get('people_id'));
                $people->first_name = $request->get('first_name');
                $people->last_name = $request->get('last_name');
                $people->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }
        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $people = People::find($id);
        $output = array(
            'first_name' => $people->first_name,
            'last_name' => $people->last_name
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $people = People::find($request->input('id'));
        if($people->delete()){
            echo 'Data deleted';
        }
    }
}
