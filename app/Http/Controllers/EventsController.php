<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Status;
use App\Event;
use Carbon\Carbon;
use  App\Property;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createOrUpdateContact(Request $request)
    {
        $isView = $request->isMethod('get');
        if ($isView) {
            $data = $this->getContactData($request, true);
            $data['event_type_id'] = $request->input('event_type_id');
            return view('events.contact_form', $data);
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
                    $client = null;
                    if (!$request->client_id) {
                        $client = Client::create($request->all());
                    } else {
                        $client = Client::find($request->client_id);
                        $client->status_id = $request->status_id;
                        $client->save();
                    }
                    $event = new Event($request->all());
                    $event->client_id = $client->id;

                    $event->save();
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

    private function getContactData(Request $request, $isView)
    {
        if ($isView) {
            $title = $request->input('id') ? 'Actualizar' : 'Registrar contacto';
            $data = [
                "title" => $title,
            ];
            $clients = Client::all();
            $statuses = Status::all();
            $data['clients'] = $clients;
            $data['statuses'] = $statuses;
            if ($request->input('id')) {
                $client = Client::find($request->input('id'));
                if ($client) {
                    $data['client'] = $client;
                }
            }
            return $data;
        }
    }


    public function createOrUpdatePropertyShow(Request $request)
    {
        $isView = $request->isMethod('get');
        if ($isView) {
            $data = $this->getContactData($request, true);
            $data['title'] =  $request->input('id') ? 'Actualizar' : 'Registrar muestra de propiedad';
            return view('events.show_property_form', $data);
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
                    $client = null;
                    if (!$request->client_id) {
                        $client = Client::create($request->all());
                    } else {
                        $client = Client::find($request->client_id);
                        $client->status_id = $request->status_id;
                        $client->save();
                    }
                    if (!$request->schedule) {
                        return redirect()->back()->withErrors(['Debe especificar fecha']);
                    }
                    $dataToUpdate = $request->all();

                    $dataToUpdate['schedule'] =  Carbon::createFromFormat('d.m.Y H:i', $request->schedule);
                    if (!$request->tokko_id) {
                        return redirect()->back()->withErrors(['Debe especificar propiedad']);
                    }

                    $property = Property::firstOrCreate(['tokko_id' => $request->tokko_id]);
                    $property->title = $request->property_title;
                    $property->save();
                    $request->property_id = $property->id;
                    date_default_timezone_set('America/Argentina/Cordoba');
                    $dataToUpdate['property_id'] =  $property->id;
                    $dataToUpdate['client_id'] =  $client->id;
                    $event = new Event($dataToUpdate);
                    $event->save();

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
}
