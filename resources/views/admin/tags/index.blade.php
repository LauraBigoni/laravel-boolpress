@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <header>
                    <h1 class="text-center">Tags del blog</h1>

                    @if (session('message'))
                        <div class="container alert alert-{{ session('type') }} text-center" role="alert">
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                </header>
                <div class="add-tags d-flex justify-content-end mb-4">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.tags.create') }}"><i
                            class="fa-solid fa-plus"></span></i></a>
                </div>
                <table class="table">
                    <thead>
                        <tr class="">
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Colore</th>
                            <th scope="col">Modificato il</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tags as $tag)
                            <tr>
                                <th scope="row">{{ $tag->id }}</th>
                                <td>{{ $tag->label }}</td>
                                <td>
                                    <a href="{{ route('admin.tags.show', $tag->id) }}"><span
                                            style="background-color: {{ $tag->color }}"
                                            class="badge badge-pill text-white">
                                            {{ $tag->color }} </span></a>
                                </td>
                                <td>{{ $tag->getFormattedDate('updated_at') }}</td>
                                <td class="d-flex align-items-center justify-content-center">
                                    <a class="btn btn-sm btn-dark mr-2" href="{{ route('admin.tags.show', $tag->id) }}"><i
                                            class="fa-regular fa-file-lines"></i></a>
                                    <a class="btn btn-sm btn-dark mr-2"
                                        href="{{ route('admin.tags.edit', $tag->id) }}"><i
                                            class="text-white fa-solid fa-pen-to-square"></i></a>

                                    <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST"
                                        class="delete-form" data-name="{{ $tag->label }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="fw-bold btn btn-sm btn-dark" type="submit"><i
                                                class="text-white fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h3>Non ci sono Tags</h3>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="delete-tags d-flex justify-content-end my-4">
                    <form action="{{ route('admin.tags.destroy_all') }}" method="POST" class="delete-form delete-all"
                        data-name="tutti i tag">
                        @csrf
                        @method('DELETE')
                        <button class="fw-bold btn btn-sm btn-danger" type="submit"><i
                                class="text-white fa-solid fa-trash"></i> Elimina tutto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/delete-confirm.js') }}" defer></script>
@endsection
