@extends('adminlte::page')

@section('title', 'Clientes ')

@section('content_header')
<h1> {{ $title }} </h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="POST">
                    @isset($client)
                    <input type="hidden" value="{{$client->id}}" name="id">
                    @endisset
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre </label>
                                <input required type="text" class="form-control" name="first_name"
                                    placeholder="Escribir aquí" @isset($client) value="{{$client->first_name}}"
                                    @endisset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Apellido </label>
                                <input required type="text" class="form-control" name="last_name"
                                    placeholder="Escribir aquí" @isset($client) value="{{$client->last_name}}"
                                    @endisset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono </label>
                                <input required type="text" class="form-control" name="phone"
                                    placeholder="Escribir aquí" @isset($client) value="{{$client->phone}}" @endisset>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Datos Adicionales (No obligatorio)</label>
                                <textarea type="text" class="form-control" name="additional_data"
                                    placeholder="Escribir aquí"> @isset($client) {{$client->additional_data}} @endisset </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control"
                               
                                
                                required name="status_id">
                                    @foreach ($statuses as $status)
                                    <option style="background: {{$status->color}}" value="{{$status->id}}">
                                        {{$status->title}} </option>
                                    @endforeach
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
@stop

