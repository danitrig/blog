<div class="modal fade" id="modal-update-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Editar Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>

            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Título: </label>
                        <input type="text" name="title" class="form-control" id="post"
                            value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="category-id">Categoría</label>
                        <select name="category_id" id="category-id" class="form-control">
                            <option value="{{ $post->category_id }}"> {{ $post->category->name }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="contenido">Contenido</label>
                        <textarea name="contenido" class="form-control" id="contenido" cols="30" rows="10">{{ $post->contenido }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <small>imagen actual</small> <br>
                        <img src="{{ asset($post->image) }}" width="80px" class="img-fluid img-thumbnail"
                            alt="{{ $post->image }}">

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
