@extends('adminlte::page')

@section('title', 'Eventos ')

@section('content_header')
<h1> {{ $title }} </h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="box">
            @if($errors->any())
            <div class="box-header">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Error</h4>
                    {{$errors->first()}}
                </div>
            </div>
            @endif

            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="POST">
                    @isset($schedule)
                    <input type="hidden" value="{{$schedule->id}}" name="id">
                    @endisset
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Título (opcional) </label>
                                <input required type="text" class="form-control" name="title"
                                    placeholder="Escribir aquí" @isset($schedule) value="{{$schedule->title}}"
                                    @endisset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha y Hora </label>
                                <input required type="text" readonly="readonly" id="datetimepicker"
                                    placeholder="Presione aquí" class="form-control" name="at" @isset($schedule)
                                    value="{{$schedule->last_name}}" @endisset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" id="propTitle" name="property_title">
                            <div class="form-group">
                                <label>Propiedad </label>
                                <select class="form-control select2" id="properties_select" required name="tokko_id">
                                    <option value="-1"> No corresponde </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo de evento </label>
                                <select class="form-control" required name="schedule_type_id">

                                    @foreach ($schedules_types as $schedule_type)
                                    <option @isset($schedule) @if ($schedule->schedule_type_id == $schedule_type->id)
                                        selected @endif
                                        @endisset
                                        style="background: {{$schedule_type->color}}; color: white"
                                        value="{{$schedule_type->id}}">
                                        {{$schedule_type->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cliente</label>
                                <select class="form-control" required name="client_id">
                                    <option value="-1"> No corresponde </option>
                                    @foreach ($clients as $client)
                                    <option @isset($schedule) @if ($schedule->client_id == $sclient->id) selected @endif
                                        @endisset
                                        value="{{$client->id}}">
                                        {{$client->last_name}} {{$client->first_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirmado</label>
                                <select class="form-control" required name="confirmed">
                                    <option value="1"> Confirmado </option>
                                    <option value="0"> No Confirmado </option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"> {{ $title }}</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>

    </div>
</div>
@stop

@section('css')
<link href="{{ asset('css/colorpicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/dtpicker.min.css') }}" rel="stylesheet">

@stop

@section('js')
<script src="{{ asset('js/dtpicker.min.js') }}" type="text/javascript"></script>
<script>
    $.datetimepicker.setLocale('es');

$('#datetimepicker').datetimepicker({ format:'d.m.Y H:m'});
</script>
<script src="{{ asset('js/properties.js') }}" type="text/javascript"></script>

@stop