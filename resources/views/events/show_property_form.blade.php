@extends('adminlte::page')

@section('title', 'Registrar Muestra de Propiedad')

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
                    @isset($event)
                    <input type="hidden" value="{{$event->id}}" name="id">
                    @endisset
                    <input type="hidden" id="status_id" name="status_id" value="1">
                    <input type="hidden" id="event_type_id" name="event_type_id" value="3">

                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group" id="clientPhoneSelector">
                                <label>Nro. de Contacto</label>
                                <select class="form-control" id="clients" required name="client_id">
                                    <option></option>
                                    @foreach ($clients as $client)
                                    <option @isset($event) @if ($event->client_id == $sclient->id) selected @endif
                                        @endisset
                                        value="{{$client->id}}">
                                        {{$client->phone}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="newClientForm">

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label>Nombre </label>
                                    <input disabled id="first_name" type="text" class="form-control" name="first_name"
                                        placeholder="Escribir aquí">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Apellido </label>
                                    <input disabled id="last_name" type="text" class="form-control" name="last_name"
                                        placeholder="Escribir aquí">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Teléfono </label>
                                    <input disabled id="phone" type="tel" class="form-control" name="phone"
                                        placeholder="Introducir código de área sin el 0. Si es móvil, introducir sin el 15">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fecha y Hora </label>
                                    <input required type="text" readonly="readonly" id="datetimepicker"
                                        placeholder="Presione aquí" class="form-control" name="schedule" @isset($event)
                                        value="{{$event->schedule}}" @endisset>
                                </div>
                            </div>


                        <div class="col-md-6">
                            <input type="hidden" id="propTitle" name="property_title">
                            <div class="form-group">
                                <label>Propiedad </label>
                                <select class="form-control select2" id="properties_select" required name="tokko_id">
                                    <option></option>
                                </select>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea type="text" class="form-control" name="description" id="description"
                                    placeholder="Escribir aquí"> @isset($event) {{$event->aclarations}} @endisset </textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Establecer estado del cliente como: </label>
                                <br>

                                @foreach ($statuses as $status)

                                <div class="btn status_selector" id="{{$status->id}}" data-id="{{$status->id}}"
                                    style="color: white; background: {{$status->color}}">
                                    {{$status->title}}
                                </div>
                                @endforeach


                            </div>
                        </div>


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary bg-red"> {{ $title }}</button>
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

<script>
    const clients = {};
</script>
@foreach ($clients as $client)
<script>
    clients[{{$client->id}}] = {
                first_name: "{{$client->first_name}}",
                last_name: "{{$client->last_name}}",
                phone: "{{$client->phone}}"
}
</script>
@endforeach
<script src="{{ asset('js/events.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/properties.js') }}" type="text/javascript"></script>

<script>

</script>
@stop