<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class ClientStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
       
        $statuses = Status::all();

        $data = [
            "statuses" => $statuses,
        ];
        return view('clients_status.list', $data);
    }

    public function createOrUpdate(Request $request) {

        $isView = $request->isMethod('get');

        if($isView) {
            $title = $request->input('id') ? 'Editar' : 'Añadir';
      
            $data = [
                "title" => $title,
            ];
            if($request->input('id')) {
                $status = Status::find($request->input('id'));
                if($status) {
                    $data['status'] = $status;
                }
            }
            return view('clients_status.form', $data);
        } else {
            if($request->id) {
                $status = Status::find($request->id);
                if($status) {
                    $status->update($request->all());
                }
            }else {
                $status = Status::create($request->all());
            }
    
        }
        return redirect()->route('client_status');
    }

    public function delete($id) {
        Status::destroy($id);
        return redirect()->route('client_status'); 
    }


}

