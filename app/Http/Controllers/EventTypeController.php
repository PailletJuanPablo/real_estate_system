<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventType;

class EventTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
       
        $event_types = EventType::all();

        $data = [
            "event_types" => $event_types,
        ];
        return view('events.types.list', $data);
    }

    public function createOrUpdate(Request $request) {

        $isView = $request->isMethod('get');

        if($isView) {
            $title = $request->input('id') ? 'Editar Tipo de Evento' : 'Añadir Tipo de Evento';
      
            $data = [
                "title" => $title,
            ];
            if($request->input('id')) {
                $event_type = EventType::find($request->input('id'));
                if($event_type) {
                    $data['event_type'] = $event_type;
                }
            }
            return view('events.types.form', $data);
        } else {
            if($request->id) {
                $event_type = EventType::find($request->id);
                if($event_type) {
                    $event_type->update($request->all());
                }
            }else {
                $event_type = EventType::create($request->all());
            }
    
        }
        return redirect()->route('event_types');
    }

    public function delete($id) {
        EventType::destroy($id);
        return redirect()->route('event_types'); 
    }
}
