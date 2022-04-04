@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <header>
                    <h1 class="text-center">Lista dei post</h1>
                    @if (session('message'))
                        <div class="container alert alert-{{ session('type') }} text-center" role="alert">
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                </header>
                <div class="add-posts d-flex justify-content-end mb-4">
                    <a class="btn btn-sm btn-info" href="{{ route('admin.posts.create') }}"><i
                            class="fa-solid fa-plus"></span></i></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Publish</th>
                            <th scope="col">Category</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Title</th>
                            <th scope="col">Autore</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>
                                    <form action="{{ route('admin.posts.toggle', $post->id) }}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        <button class="btn btn-sm" type="submit"><i
                                                class="fa-solid fa-toggle-{{ $post->is_published ? 'on' : 'off' }} text-{{ $post->is_published ? 'success' : 'danger' }}"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    @if (isset($post->category))
                                        <a href="{{ route('admin.categories.posts', $post->category_id) }}"><span
                                                class="badge badge-pill badge-{{ $post->category->color }}">
                                                {{ $post->category->label }}
                                            </span></a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @forelse ($post->tags as $tag)
                                        <a href="{{ route('admin.tags.posts', $tag->id) }}"><span
                                                style="background-color: {{ $tag->color }}"
                                                class="badge badge-pill text-white">
                                                {{ $tag->label }} </span></a>
                                    @empty
                                        <span>-</span>
                                    @endforelse
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>{{ $post->getFormattedDate('updated_at') }}</td>
                                <td class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-sm btn-dark mr-2"
                                        href="{{ route('admin.posts.show', $post->id) }}"><i
                                            class="fa-regular fa-file-lines"></i></a>
                                    <a class="btn btn-sm btn-dark mr-2"
                                        href="{{ route('admin.posts.edit', $post->id) }}"><i
                                            class="text-white fa-solid fa-pen-to-square"></i></a>

                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                        class="delete-form" data-name="{{ $post->title }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="fw-bold btn btn-sm btn-dark" type="submit"><i
                                                class="text-white fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    <h3>Non ci sono post</h3>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="delete-categories d-flex justify-content-end">
                    <form action="{{ route('admin.posts.destroy_all') }}" method="POST" class="delete-form delete-all"
                        data-name="tutti i post">
                        @csrf
                        @method('DELETE')
                        <button class="fw-bold btn btn-sm btn-danger" type="submit"><i
                                class="text-white fa-solid fa-trash"></i> Elimina tutto</button>
                    </form>
                </div>
                @if ($posts->hasPages())
                    <div class="d-flex justify-content-end mt-4">
                        {{ $posts->links() }}
                    </div>
                @endif

                <hr>
                <div class="row d-flex flex-wrap justify-content-between align-items-start">
                    @foreach ($categories as $category)
                        <div class="col-3 mb-3">
                            <h3 class="text-uppercase"> {{ $category->label }}</h3>
                            @foreach ($category->posts as $post)
                                <h5><a class="text-decoration-none"
                                        href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></h5>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/delete-confirm.js') }}" defer></script>
@endsection
