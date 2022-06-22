<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Posts Blog Tarea 6</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <!-- Logo -->
    <nav class="navbar navbar-light bg-main">
        <div class="container p-4">
            <a class="navbar-brand m-auto" href="#">
                <img src="{{ asset('images/logo.png') }}" width="120" alt="" loading="lazy">
            </a>
            <nav class="text-center my-2">
                <a href="http://127.0.0.1:8000/login" class="mx-3 pb-3 link-category d-block d-md-inline">Iniciar
                    Sesion</a>
            </nav>
            <nav class="text-center my-2">
                <a href="http://127.0.0.1:8000/register"
                    class="mx-3 pb-3 link-category d-block d-md-inline">Registro</a>
            </nav>
            <nav class="text-center my-2">
                <a href="http://127.0.0.1:8000/admin/posts" class="mx-3 pb-3 link-category d-block d-md-inline">Gestión
                    de Posts</a>
            </nav>
        </div>
    </nav>
    <!-- Contenido -->
    <section class="container-fluid content">
        <!-- Categorías -->
        <div class="row justify-content-center">
            <div class="col-10 col-md-12">
                <nav class="text-center my-5">
                    @foreach ($categories as $category)
                        <a href=""
                            class="mx-3 pb-3 link-category d-block d-md-inline">{{ $category->name }}</a>
                    @endforeach
                </nav>
            </div>
        </div>
        <!-- Posts -->
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row">

                    @foreach ($posts as $post)
                        <div class="col-md-4 col-12 justify-content-center mb-5">
                            <div class="card m-auto" style="width: 18rem;">
                                <img class="card-img-top" src="{{ $post->image }}" alt="{{ $post->name }}">
                                <div class="card-body">
                                    <small class="card-txt-category">{{ $post->category->name }}</small>
                                    <h5 class="card-title my-2">{{ $post->title }}</h5>
                                    <div class="d-card-text">
                                        {{ $post->contenido }}
                                    </div>
                                    <a href="{{ route('post', [$post->id]) }}" class="post-link"><b>Leer más</b></a>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 text-left">
                                            <span class="card-txt-author">{{ $post->user->nick }}</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span
                                                class="card-txt-date">{{ $post->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12">
                <!-- Paginador -->
                {{ $posts->links() }}

            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="container-fluid bg-main">
        <div class="row text-center p-4">
            <div class="mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="danitrig logo" width="120" id="logofooter">
            </div>
            <div id="col-md-10">
                <p class="mt-3">Copyright © 2022 Daniel Gómez, Tarea 6 Servidor. <br></p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
</body>

</html>
