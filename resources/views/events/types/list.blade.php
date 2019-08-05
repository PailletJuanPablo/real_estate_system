@extends('adminlte::page')

@section('title', 'Tipos de Eventos')

@section('content_header')
<h1>Tipos de Eventos</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="box">

            <div class="box-header">
                <a class="btn btn-app bg-red" href="{{route('event_types/form')}}">
                    <i class="fa fa-plus"></i> Añadir
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="table_id" class="table table-bordered table-hover dataTable">
                    <thead>
                        <tr>
                            <th>Titulo </th>
                            <th>Descripción</th>
                            <th>Color</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($event_types as $event_type)
                        <tr>
                            <td> {{$event_type->name}} </td>
                            <td> {{$event_type->description}} </td>
                            <td>
                                <div style="height: 50px; width: 100%; background: {{ $event_type->color}}"></div>
                            </td>
                            <td>
                                <form method="POST" onsubmit="return confirm('¿Confirma eliminación?');"
                                    action="{{route('event_types/delete', ['id' => $event_type->id])}}">
                                    <button type="submit" class="btn bg-red btn-sm btn-block"> <i class="fa fa-remove"></i>
                                        Eliminar </button>
                                </form>
                                <a href="{{route('event_types/form', ['id'=> $event_type->id])}}"
                                    class="btn bg-blue btn-sm btn-block"> <i class="fa fa-pencil"></i>
                                    Editar </span>
                                </a>
                            </td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->
    </div>
</div>

@stop

@section('js')
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@stop