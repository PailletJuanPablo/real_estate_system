<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\ScheduleType;
use App\Client;
use App\Property;

use Carbon\Carbon;

class SchedulesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $schedules = Schedule::with('client', 'property', 'type')->limit(3)->get();

        $data = [
            "schedules" => $schedules,
        ];
        return view('schedules.index', $data);
    }

    public function createOrUpdate(Request $request)
    {

        $isView = $request->isMethod('get');

        $schedules_types = ScheduleType::all();
        $clients = Client::all();

        if ($isView) {
            $title = $request->input('id') ? 'Editar' : 'Añadir';

            $data = [
                "title" => $title,
                "schedules_types" => $schedules_types,
                "clients" => $clients
            ];
            if ($request->input('id')) {
                $schedule = Schedule::find($request->input('id'));
                if ($schedule) {
                    $data['schedule'] = $schedule;
                }
            }
            return view('schedules.form', $data);
        } else {
         
            $dataToUpdate = $request->all();
            if(!$request->at) {
                return redirect()->back()->withErrors( ['Debe especificar fecha']);   
            }
            $dataToUpdate['at'] =  Carbon::createFromFormat('d.m.Y H:i', $request->at);
            $dataToUpdate['property_id'] =  null;
            if($request->tokko_id != -1){
                $property = Property::firstOrCreate(['tokko_id'=> $request->tokko_id]);
                $property->title = $request->property_title;
                $property->save();
                $request->property_id = $property->id;
                date_default_timezone_set('America/Argentina/Cordoba');
                $dataToUpdate['property_id'] =  $property->id;
            }
            if($dataToUpdate['client_id'] == -1) $dataToUpdate['client_id'] = null;
   
          

            if ($request->id) {
                $schedule = Schedule::find($request->id);
                if ($schedule) {
                    $schedule->update($dataToUpdate);
                }
            } else {
                $schedule = Schedule::create($dataToUpdate);
            }
        }
        return redirect()->route('schedules');
    }

    public function delete($id)
    {
        ScheduleType::destroy($id);
        return redirect()->route('schedules');
    }
}
