@extends('adminlte::page')

@section('title', 'Contactos ')

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
                    @isset($process)
                    <input type="hidden" value="{{$process->id}}" name="id">
                    @endisset
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cliente</label>
                                <select class="form-control select2" required name="client_id">
                                    @foreach ($clients as $client)
                                    <option @isset($process) @if ($process->client_id == $sclient->id) selected @endif
                                        @endisset
                                        value="{{$client->id}}">
                                        {{$client->last_name}} {{$client->first_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <input type="hidden" id="propTitle" name="property_title">
                                <div class="form-group">
                                    <label>Propiedad </label>
                                    <select class="form-control select2" id="properties_select" required name="tokko_id">
                                    </select>
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label> <input type="checkbox"  id="newClient"> Agregar nuevo
                                        cliente</label>

                                </div>


                            </div>

                            <div id="newClientForm">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre </label>
                                        <input type="text" class="form-control" name="first_name"
                                            placeholder="Escribir aquí" 
                                            >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Apellido </label>
                                        <input type="text" class="form-control" name="last_name"
                                            placeholder="Escribir aquí" 
                                            >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Teléfono </label>
                                        <input type="text" class="form-control" name="phone" placeholder="Escribir aquí"
                                           >
                                    </div>
                                </div>


                            </div>
                        </div>
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observaciones</label>
                                <textarea type="text" class="form-control" name="aclarations" id="aclarations"
                                    placeholder="Escribir aquí"> @isset($process) {{$process->aclarations}} @endisset </textarea>
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
<script src="{{ asset('js/processes.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/properties.js') }}" type="text/javascript"></script>

<script>
    $('#aclarations').wysihtml5();

        
</script>
@stop