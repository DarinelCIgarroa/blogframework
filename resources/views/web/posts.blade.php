@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-8 col-lg-8 mx-auto">
            <h1>Lista de Artículos</h1>
            @foreach($posts as $post)
                <div class="card mb-3">
                    @if($post->file)
                        <img src="{{$post->file}}" class="img-responsive card-img-top" alt="{{ $post->name }}">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">{{ $post->name }}</h4>
                        <p class="card-text">
                            {{ $post->excerpt }}
                        </p>
                        <a href="{{ route('post', $post->slug) }}" class="d-flex justify-content-end">Leer más</a>
                    </div>
                </div>
            @endforeach
            {{ $posts->render() }}
        </div>
    </div>
</div>
@endsection
