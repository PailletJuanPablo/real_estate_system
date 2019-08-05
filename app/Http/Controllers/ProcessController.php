<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Process;
use App\Client;

class ProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $processes = Process::with('client', 'property', 'type')->limit(3)->get();

        $data = [
            "processes" => $processes,
        ];
        return view('processes.index', $data);
    }

    public function createOrUpdate(Request $request)
    {

        $isView = $request->isMethod('get');
        $clients = Client::all();

        if ($isView) {
            $title = $request->input('id') ? 'Editar' : 'Añadir';

            $data = [
                "title" => $title,
                "clients" => $clients
            ];
            if ($request->input('id')) {
                $process = Process::find($request->input('id'));
                if ($process) {
                    $data['process'] = $process;
                }
            }
            return view('processes.form', $data);
        } else {

            $dataToUpdate = $request->all();
  
            if (!$request->tokko_id) {
                return redirect()->back()->withErrors(['Debe especificar propiedad']);
            }
            $dataToUpdate['at'] =  Carbon::createFromFormat('d.m.Y H:i', $request->at);
            $dataToUpdate['property_id'] =  null;

            $property = Property::firstOrCreate(['tokko_id' => $request->tokko_id]);
            $property->title = $request->property_title;
            $property->save();
            $request->property_id = $property->id;
            date_default_timezone_set('America/Argentina/Cordoba');
            $dataToUpdate['property_id'] =  $property->id;

            if ($dataToUpdate['client_id'] == -1) $dataToUpdate['client_id'] = null;



            if ($request->id) {
                $schedule = Schedule::find($request->id);
                if ($schedule) {
                    $schedule->update($dataToUpdate);
                }
            } else {
                $schedule = Schedule::create($dataToUpdate);
            }
        }
        return redirect()->route('processes');
    }

    public function delete($id)
    {
        ScheduleType::destroy($id);
        return redirect()->route('schedules');
    }
}
