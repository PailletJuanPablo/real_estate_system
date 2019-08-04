@extends('adminlte::page')

@section('title', 'Agenda')

@section('content_header')
<h1>Agenda</h1>
@stop

@section('content')
<div class="col-md-3">



</div>
<div class="col-md-9">

  <div class="box">
    <div class="box-body">
      <div id="calendar">
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