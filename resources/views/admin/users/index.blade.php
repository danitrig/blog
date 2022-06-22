@extends('adminlte::page')
@section('title', 'Admin Users')

@section('content_header')
    <h1>
        Usuarios
    </h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Usuarios</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="users" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Nick</th>
                                    <th>Email</th>
                                    <th>Imagen</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->subname }}</td>
                                        <td>{{ $user->nick }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <img src="{{ asset($user->image) }}" alt="{{ $user->title }}"
                                                class="img-fluid img-thumbnail" width="100px">
                                        </td>
                                        <th>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#modal-update-user-{{ $user->id }}">
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modal-delete-user-{{ $user->id }}">
                                                Borrar
                                            </button>
                                        </th>
                                    </tr>

                                    <!-- modal Update users -->
                                    @include('admin.users.modal-update-user')
                                    <!-- /.modal -->
                                    <!-- modal Update Borrar -->
                                    @include('admin.users.modal-delete-user')
                                    <!-- /.modal -->
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Nick</th>
                                    <th>Email</th>
                                    <th>Imagen</th>
                                    <th>Operaciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#users').DataTable({
                "order": [
                    [3, "desc"]
                ]
            });
        });
    </script>
@stop
