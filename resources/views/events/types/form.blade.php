@extends('adminlte::page')

@section('title', 'Tipos de Eventos')


@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="box">
            <div class="box-header">
                    <h2 class="box-title"> {{ $title }} </h1>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form role="form" method="POST">
                    @isset($event_type)
                    <input type="hidden" value="{{$event_type->id}}" name="id">
                    @endisset
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre </label>
                                <input required type="text" class="form-control" name="name"
                                    placeholder="Escribir aquí" @isset($event_type) value="{{$event_type->name}}" @endisset>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input required type="text" style="color: transparent" readonly="readonly" readonly class="form-control" spellcheck="false" name="color"
                                        id="colorpicker" placeholder="Presione aquí" @isset($event_type)
                                        value="{{$event_type->color}}" @endisset>
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripcion</label>
                                <textarea type="text" class="form-control" name="description"
                                required placeholder="Escribir aquí"> @isset($event_type) {{$event_type->description}} @endisset </textarea>
                            </div>
                        </div>
                      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary bg-blue"> {{ $title }}</button>
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
    } 

    $(document ).ready(function() {
            $('#colorpicker').colorpicker({format: 'hex'}).on('changeColor', (e) => {
            $('#colorpicker').css('background', e.color.toString('rgba'));
        });
});

</script>
@stop