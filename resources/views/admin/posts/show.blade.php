@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('message'))
                <div class="container alert alert-{{ session('type') }} text-center" role="alert">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            <div class="d-flex justify-content-end align-items-center col-12 pt-3">
                <a class="btn btn-sm btn-info ml-auto" href="{{ route('admin.posts.index') }}">Indietro <i
                        class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="col-12 d-flex flex-row justify-content-between align-items-center pt-5">
                <div class="col-2"> 
                    @if ($post->image)
                    <img class="img-fluid" src="{{ asset("storage/$post->image") }}" alt="{{ $post->slug }}">
                    @endif
                </div>
                <div class="col-10">
                    <h2 class="mb-4">{{ $post->title }}</h2>
                    <p> {{ $post->content }} </p>
                </div>
            </div>
            <div class="col-12 d-flex flex-row justify-content-between align-items-center pt-5 ">
                <div class="flex-grow-1">
                    @if (isset($post->category))
                        <p class="badge badge-pill badge-{{ $post->category->color }}">
                            {{ $post->category->label }}
                        </p>
                    @else
                        -
                    @endif
                    <br>
                    <h4 class="pt-4 mb-4">Tags:</h4>
                    <div class=" d-flex flex-wrap flex-row">
                        @forelse ($post->tags as $tag)
                            <p class="bagde rounded py-1 px-2 mx-2 text-center"
                                style="background-color: {{ $tag->color }}">{{ $tag->label }}</p>
                        @empty <p>Nessun tag</p>
                        @endforelse
                    </div>
                    <span>Creato il: {{ $post->getFormattedDate('created_at') }}</span> <br>
                    <span> Ultimo aggiornamento: {{ $post->getFormattedDate('updated_at') }}</span>
                </div>
                <div class="d-flex mt-auto flex-shrink-1">
                    <a class="btn btn-sm btn-dark ml-auto mr-2" href="{{ route('admin.posts.edit', $post->id) }}"><i
                            class="text-white fa-solid fa-pen-to-square"></i></a>

                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="delete-form"
                        data-name="{{ $post->title }}">
                        @csrf
                        @method('DELETE')

                        <button class="fw-bold btn btn-sm btn-dark" type="submit"><i
                                class="text-white fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/delete-confirm.js') }}" defer></script>
@endsection
