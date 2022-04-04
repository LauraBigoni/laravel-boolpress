@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-end align-items-center col-12 pt-3">
                <a class="btn btn-sm btn-info ml-auto" href="{{ route('admin.tags.index') }}">Indietro <i
                        class="fa-solid fa-arrow-left"></i></a>
            </div>
            <h1 class="pb-5"> Post che parlano di
                <span style="background-color: {{ $tag->color }}" class="badge badge-pill text-white">
                    {{ $tag->label }} </span>
            </h1>
            <div class="d-flex flex-row flex-wrap justify-content-between align-items-start">

                @foreach ($tag->posts as $post)
                    <div class="col-12">
                        <a class="text-decoration-none" href="{{ route('admin.posts.show', $post->id) }}">
                            &#903; {{ $post->title }}</a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-12 delete-tags d-flex justify-content-end my-4">
                <form action="{{ route('admin.posts.destroy_all') }}" method="POST" class="delete-form delete-all"
                    data-name="tutte le categorie">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="tag_id" value="{{ $tag->id }}">
                    <button class="fw-bold btn btn-sm btn-danger" type="submit"><i class="text-white fa-solid fa-trash"></i>
                        Elimina tutto</button>
                </form>
            </div>
        </div>
    </div>
@endsection
