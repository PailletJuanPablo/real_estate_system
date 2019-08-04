@extends('adminlte::page')

@section('title', 'Estados de Clientes ')

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
                    @isset($status)
                    <input type="hidden" value="{{$status->id}}" name="id">
                    @endisset
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nombre </label>
                                <input required type="text" class="form-control" name="title"
                                    placeholder="Escribir aquí" @isset($status) value="{{$status->title}}" @endisset>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Descripcion (No obligatorio)</label>
                                <textarea type="text" class="form-control" name="description"
                                    placeholder="Escribir aquí"> @isset($status) {{$status->description}} @endisset </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Color</label>
                                <input required type="text" class="form-control" spellcheck="false" name="color"
                                    id="colorpicker" placeholder="Escribir aquí" @isset($status)
                                    value="{{$status->color}}" @endisset>


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

@section('js')

<script src="{{ asset('js/colorpicker.js') }}"></script>
<script>
    if( $('#colorpicker').val()){
        $('#colorpicker').css('background', $('#colorpicker').val());
        $('#colorpicker').css('color', $('#colorpicker').val());
    } 

    $(document ).ready(function() {
            $('#colorpicker').colorpicker({format: 'hex'}).on('changeColor', (e) => {
            $('#colorpicker').css('background', e.color.toString('rgba'));
            $('#colorpicker').css('color', e.color.toString('rgba'));
        });
});

</script>
@stop