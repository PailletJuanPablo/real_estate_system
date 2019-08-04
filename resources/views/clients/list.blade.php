@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
<h1>Clientes</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="box">

            <div class="box-header">
                <a class="btn btn-app" href="{{route('clients/form')}}">
                    <i class="fa fa-plus"></i> Añadir
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="table_id" class="table table-bordered table-hover dataTable">
                    <thead>
                        <tr>
                            <th>Nombre </th>
                            <th>Tel</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($clients as $client)
                        <tr>
                            <td> {{$client->first_name}}  {{$client->last_name}}   </td>
                            <td> {{$client->phone}} </td>
                            <td>
                                <span class="label"
                                style="height: 20px; width: 100px; background: {{ $client->status->color}}"> 
                                {{$client->status->title}} </span>
                            </td>
                            <td class="table-actions-flex">
                                <form method="POST" onsubmit="return confirm('¿Confirma eliminación?');"
                                    action="{{route('clients/delete', ['id' => $client->id])}}">
                                    <button type="submit" class="btn label label-danger"> <i class="fa fa-remove"></i>
                                        Eliminar </button>
                                </form>
                                <a href="{{route('clients/form', ['id'=> $client->id])}}"
                                    class="btn label label-primary"> <i class="fa fa-pencil"></i>
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