@extends('adminlte::page')

@section('title', 'Oviedo BR')

@section('content_header')
<h1>Oviedo Bienes Raíces</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-3">
        <a href="{{route('contacts/form', ['event_type_id'=> 1])}}">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>Registrar</h3>
                    <p>Contacto Teléfonico</p>
                </div>
                <div class="icon">
                    <i class="fa fa-phone"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{route('contacts/form', ['event_type_id'=> 2])}}">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>Registrar</h3>
                    <p>Contacto Presencial</p>
                </div>
                <div class="icon">
                    <i class="ion ion-home"></i>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{route('properties_schedules/form', ['event_type_id'=> 3])}}">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>Registrar</h3>
                    <p>Muestra de propiedad </p>
                </div>
                <div class="icon">
                    <i class="ion ion-home"></i>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="box">
            <div class="box-header">


                <div class="box-header">
                    <h3 class="box-title"> Eventos cercanos</h3>
                  
                </div>
            </div>
            <div class="box-body">
                <script>
                    const events = [];
                </script>

                @foreach ($events as $event)
                <div class="schedule-box" style="background: {{$event->type->color}}">
                    <p class="title">{{$event->type->name}} </p>
                    <hr>
                    <p class="date"> Fecha: {{$event->date_at()}} - {{$event->time_at()}} </p>
                    @if ($event->client_id)
                    <p class="client">Cliente: {{ $event->client->last_name }} {{ $event->client->first_name }}
                    </p>
                    @endif
                    @if ($event->property_id)
                    <p class="property"> Propiedad: {{ $event->property->title }} </p>
                    @endif



                </div>

                <script>
                    events.push({
                  title: "{{$event->type->name}}",
                  start: '{{$event->schedule}}',
                  backgroundColor: '{{$event->type->color}}',
                  borderColor: '{{$event->type->color}}',
              });
              console.log(events);
      
                </script>
                @endforeach
            </div>
        </div>


    </div>
    <div class="col-md-9">

        <div class="box">
            <div class="box-body">
                <div id="calendar">
                </div>
            </div>
        </div>
    </div>
</div>

@stop


@section('css')
<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/fullcalendar.css" rel="stylesheet" type="text/css" />
<link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/fullcalendar.print.css" rel="stylesheet"
    type="text/css" />
@stop

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/fullcalendar.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/lang/es.js" type="text/javascript"></script>
<script src="{{ asset('js/scheduler.js') }}" type="text/javascript"></script>
<script>

</script>


@stop