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

    public function index()
    {
        $clients = Client::all();

        $data = [
            "clients" => $clients,
        ];
        return view('clients.list', $data);
    }


    public function createOrUpdate(Request $request)
    {

        $isView = $request->isMethod('get');

        if ($isView) {
            $title = $request->input('id') ? 'Editar' : 'Añadir';

            $data = [
                "title" => $title,
            ];
            $statuses = Status::all();
            $data['statuses'] = $statuses;
            if ($request->input('id')) {
                $client = Client::find($request->input('id'));
                if ($client) {
                    $data['client'] = $client;
                }
            }
            return view('clients.form', $data);
        } else {
            if ($request->id) {
                $client = Client::find($request->id);
                if ($client) {
                    try {
                        $client->update($request->all());
                    } catch (\Illuminate\Database\QueryException $e) {
                        if ($e->errorInfo[0] == "23000") {
                            return redirect()->back()->withErrors(['No se pudo agregar el cliente. El mismo ya se encuentra registrado']);
                        }
                        return redirect()->route('clients');
                    }
                }
            } else {
                try {
                    $client = Client::create($request->all());
                } catch (\Illuminate\Database\QueryException $e) {
                    if ($e->errorInfo[0] == "23000") {
                        return redirect()->back()->withErrors(['No se pudo agregar el cliente. El mismo ya se encuentra registrado']);
                    }
                    return redirect()->route('clients');
                }
            }
        }
        return redirect()->route('clients');
    }

    public function delete($id)
    {
        Client::destroy($id);
        return redirect()->route('clients');
    }

    public function getByStatus($status_id)
    {
        $clients = Client::where('status_id', $status_id)->get();
        $data = [
            "clients" => $clients,
        ];
        return view('clients.list', $data);
    }
}
