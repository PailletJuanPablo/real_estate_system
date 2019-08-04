<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Status;

class ClientsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $clients = Client::all();

        $data = [
            "clients" => $clients,
        ];
        return view('clients.list', $data);
    }

    
    public function createOrUpdate(Request $request) {

        $isView = $request->isMethod('get');

        if($isView) {
            $title = $request->input('id') ? 'Editar' : 'Añadir';
      
            $data = [
                "title" => $title,
            ];
            $statuses = Status::all();
            $data['statuses'] = $statuses;
            if($request->input('id')) {
                $client = Client::find($request->input('id'));
                if($client) {
                    $data['client'] = $client;
                }
            }
            return view('clients.form', $data);
        } else {
            if($request->id) {
                $client = Client::find($request->id);
                if($client) {
                    $client->update($request->all());
                }
            }else {
                $client = Client::create($request->all());
            }
    
        }
        return redirect()->route('clients');
    }

    public function delete($id) {
        Client::destroy($id);
        return redirect()->route('clients'); 
    }


    

}
