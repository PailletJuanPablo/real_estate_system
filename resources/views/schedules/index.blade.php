@extends('adminlte::page')

@section('title', 'Agenda')

@section('content_header')
<h1>Agenda</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="box">
      <div class="box-header">
      

        <div class="box-header">
            <h3 class="box-title"> Eventos cercanos</h3>
            <br><br>
            <a class="btn btn-primary" href="{{route('schedules/form')}}">
              <i class="fa fa-plus"></i> Registrar nuevo
            </a>
          </div>
      </div>
      <div class="box-body">
        <script>
          const events = [];
        </script>

        @foreach ($schedules as $schedule)
        <div class="schedule-box" style="background: {{$schedule->type->color}}">
          <p class="title">{{$schedule->type->name}} </p>
          <hr>
          <p class="date"> Fecha: {{$schedule->date_at()}} - {{$schedule->time_at()}} </p>
          @if ($schedule->client_id)
          <p class="client">Cliente: {{ $schedule->client->last_name }} {{ $schedule->client->first_name }}</p>
          @endif
          @if ($schedule->property_id)
          <p class="property"> Propiedad: {{ $schedule->property->title }} </p>
          @endif



        </div>

        <script>
        events.push({
            title: "{{$schedule->type->name}}",
            start: '{{$schedule->at}}',
            backgroundColor: '{{$schedule->type->color}}',
            borderColor: '{{$schedule->type->color}}',
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