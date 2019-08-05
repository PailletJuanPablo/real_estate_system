@extends('adminlte::page')

@section('title', 'Registrar Contacto')

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
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nro de Contacto</label>
                                <select class="form-control select2" required name="client_id">
                                    @foreach ($clients as $client)
                                    <option @isset($event) @if ($event->client_id == $sclient->id) selected @endif
                                        @endisset
                                        value="{{$client->id}}">
                                        {{$client->phone}} - {{$client->last_name}} {{$client->first_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="newClientForm">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre </label>
                                    <input type="text" class="form-control" name="first_name"
                                        placeholder="Escribir aquí">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Apellido </label>
                                    <input type="text" class="form-control" name="last_name"
                                        placeholder="Escribir aquí">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Teléfono </label>
                                    <input type="tel" class="form-control" name="phone" placeholder="Introducir código de área sin el 0. Si es móvil, introducir sin el 15">
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea type="text" class="form-control" name="description" id="description"
                                    placeholder="Escribir aquí"> @isset($event) {{$event->aclarations}} @endisset </textarea>
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
<link href="{{ asset('css/editor.min.css') }}" rel="stylesheet">
@stop

@section('js')
<script src="{{ asset('js/editor.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/events.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/properties.js') }}" type="text/javascript"></script>

<script>
    $('#aclarations').wysihtml5();

</script>
@stop