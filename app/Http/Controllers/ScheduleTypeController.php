<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScheduleType;

class ScheduleTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
       
        $schedules_types = ScheduleType::all();

        $data = [
            "schedules_types" => $schedules_types,
        ];
        return view('schedules.types.list', $data);
    }

    public function createOrUpdate(Request $request) {

        $isView = $request->isMethod('get');

        if($isView) {
            $title = $request->input('id') ? 'Editar' : 'Añadir';
      
            $data = [
                "title" => $title,
            ];
            if($request->input('id')) {
                $schedule_type = ScheduleType::find($request->input('id'));
                if($schedule_type) {
                    $data['schedule_type'] = $schedule_type;
                }
            }
            return view('schedules.types.form', $data);
        } else {
            if($request->id) {
                $schedule_type = ScheduleType::find($request->id);
                if($schedule_type) {
                    $schedule_type->update($request->all());
                }
            }else {
                $schedule_type = ScheduleType::create($request->all());
            }
    
        }
        return redirect()->route('schedules_types');
    }

    public function delete($id) {
        ScheduleType::destroy($id);
        return redirect()->route('schedules_types'); 
    }
}
