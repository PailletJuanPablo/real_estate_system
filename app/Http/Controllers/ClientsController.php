<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

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
            if($request->input('id')) {
                $entity = Client::find($request->input('id'));
                if($entity) {
                    $data['entity'] = $entity;
                }
            }
            return view('clients.form', $data);
        } else {
            if($request->id) {
                $entity = Client::find($request->id);
                if($entity) {
                    $entity->update($request->all());
                }
            }else {
                $entity = Client::create($request->all());
            }
    
        }
        return redirect()->route('clients');
    }

    

}
