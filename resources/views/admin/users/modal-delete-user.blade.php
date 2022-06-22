<div class="modal fade" id="modal-delete-user-{{ $user->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">¿Estás seguro que desea eliminar el Usuario?</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="btn btn-danger">Borrar</button>
                    </form>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
