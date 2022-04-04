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
                <a class="btn btn-sm btn-info ml-auto" href="{{ route('admin.tags.index') }}">Indietro <i
                        class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="col-12 text-center d-flex flex-row justify-content-start align-items-center pt-5">
                <h4 class="mr-3"> Tag n.{{ $tag->id }} </h4>
                <h1 class="mb-3">
                    <span style="background-color: {{ $tag->color }}" class="badge badge-pill text-white">
                        {{ $tag->label }} </span>
                </h1>

            </div>
            <div class="col-12 d-flex flex-row justify-content-between align-items-center pt-5">
                <div>
                    <span>Creato il: {{ $tag->getFormattedDate('created_at') }}</span> <br>
                    <span> Ultimo aggiornamento: {{ $tag->getFormattedDate('updated_at') }}</span>
                </div>

                <a class="btn btn-sm btn-dark ml-auto mr-2" href="{{ route('admin.categories.edit', $tag->id) }}"><i
                        class="text-white fa-solid fa-pen-to-square"></i></a>

                <form action="{{ route('admin.categories.destroy', $tag->id) }}" method="POST" class="delete-form"
                    data-name="{{ $tag->label }}">
                    @csrf
                    @method('DELETE')

                    <button class="fw-bold btn btn-sm btn-dark" type="submit"><i
                            class="text-white fa-solid fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/delete-confirm.js') }}" defer></script>
@endsection
