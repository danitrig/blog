@extends('layouts.layout')    

@section('title','Detalle de Entrada')

@section('content')

    <!-- Contenido -->
    <section class="container-fluid content py-5">
        <div class="row justify-content-center">
            <!-- Post -->
            <div class="col-12 col-md-7 text-center">
                <h1>{{ $post->title }}</h1>
                <hr>
                <img src="{{ $post->image }}" alt="Post Javascript" class="img-fluid">

                <p class="text-start mt-3 post-txt">  {{ $post->title }}
                    <span>Autor: {{ $post->category->name }}</span>
                    <span class="float-end">Publicado: {{ $post->created_at->diffForHumans() }}</span>
                </p>
                <p class="text-start">
                    {{ $post->contenido }}
                </p>
                <p class="text-start post-txt"><i>Categoría: Desarrollo web</i></p>
            </div>
        </div>
    </section>

@endsection 