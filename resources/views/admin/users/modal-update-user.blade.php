<div class="modal fade" id="modal-update-user-{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Editar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nick">Nick: </label>
                        <input type="text" name="nick" readonly class="form-control" id="user"
                            value="{{ $user->nick }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre: </label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="subname">Apellidos: </label>
                        <input type="text" name="subname" class="form-control" id="subname"
                            value="{{ $user->subname }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo: </label>
                        <input type="text" name="email" readonly class="form-control" id="email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña: </label>
                        <input id="password" passwordrules="minlength:8" type="password" class="form-control"
                            name="password" autocomplete="new-password">
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <small>imagen actual</small> <br>
                        <img src="{{ asset($user->image) }}" width="80px" class="img-fluid img-thumbnail"
                            alt="{{ $user->image }}">
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
