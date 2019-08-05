@extends('adminlte::page')

@section('title', 'Estados')

@section('content_header')
<h1>Estados</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="box">

            <div class="box-header">
                <a class="btn btn-app bg-red" href="{{route('client_status/form')}}">
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

                        @foreach ($statuses as $status)
                        <tr>
                            <td> {{$status->title}} </td>
                            <td> {{$status->description}} </td>
                            <td>
                                <div style="height: 50px; width: 100%; background: {{ $status->color}}"></div>
                            </td>
                            <td>
                                <form method="POST" onsubmit="return confirm('¿Confirma eliminación?');"
                                    action="{{route('client_status/delete', ['id' => $status->id])}}">
                                    <button type="submit" class="btn bg-red btn-sm btn-block"> <i class="fa fa-remove"></i>
                                        Eliminar </button>
                                </form>
                                <a href="{{route('client_status/form', ['id'=> $status->id])}}"
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