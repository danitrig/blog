@extends('adminlte::page')
@section('title', 'Admin Posts')

@section('content_header')
    <h1>
        Posts
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-post">
            Crear
        </button>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create-post">
            Excell
        </button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-create-post">
            PDF
        </button>
    </h1>
@stop

@section('content')

    <!-- modal -->
    <div class="modal fade" id="modal-create-post">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" class="form-control" id="post">
                        </div>
                        <div class="form-group">
                            <label for="category-id">Categoría</label>
                            <select name="category_id" id="category-id" class="form-control">
                                <option value="">-- Elegir categoría --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contenido">Contenido</label>
                            <textarea name="contenido" class="form-control" id="contenido" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Imagen principal</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-outline-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Pots</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="posts" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Categoría</th>
                                    <th>Usuario</th>
                                    <th>Título</th>
                                    <th>Imagen</th>
                                    <th>Fecha de Publicación</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}"
                                                class="img-fluid img-thumbnail" width="100px">
                                        </td>
                                        <td>{{ $post->created_at }}</td>
                                        <th>
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#modal-update-post-{{ $post->id }}">
                                                Editar
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modal-delete-post-{{ $post->id }}">
                                                Borrar
                                            </button>
                                        </th>
                                    </tr>

                                    <!-- modal Update Posts -->
                                    @include('admin.posts.modal-update-post')
                                    <!-- /.modal -->
                                    <!-- modal Update Borrar -->
                                    @include('admin.posts.modal-delete-post')
                                    <!-- /.modal -->
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>ID Categoría</th>
                                    <th>ID Usuario</th>
                                    <th>Título</th>
                                    <th>Imagen</th>
                                    <th>Fecha de Publicación</th>
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
            $('#posts').DataTable({
                "order": [
                    [3, "desc"]
                ]
            });
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#contenido'))
            .catch(error => {
                console.error(error);
            });
    </script>
@stop
