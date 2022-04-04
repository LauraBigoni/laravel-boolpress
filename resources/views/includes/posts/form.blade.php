<div class="container">
    <div class="row">
        <div class="col-12">
            <header>
                @if ($post->exists)
                    <h1 class="text-center">Aggiorna il post</h1>
                @else
                    <h1 class="text-center">Crea un nuovo post</h1>
                @endif
            </header>
            @if ($errors->any())
                <div class="alert alert-{{ session('type') ?? 'danger' }} text-center" role="alert">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="d-flex justify-content-end align-items-center col-12 pt-3">
                <a class="btn btn-sm btn-info ml-auto" href="{{ route('admin.posts.index') }}">Indietro <i
                        class="fa-solid fa-arrow-left"></i></a>
            </div>
            @if ($post->exists)
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST"
                    class="col-12 d-flex flex-wrap align-items-center" enctype="multipart/form-data" novalidate>
                    @method('PUT')
                @else
                    <form action="{{ route('admin.posts.store') }}" method="POST"
                        class="col-12 d-flex flex-wrap align-items-center" enctype="multipart/form-data" novalidate>
            @endif
            @csrf
            <div class="form-group col-8">
                <label for="title">Titolo:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $post->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-4">
                <label for="category">Categoria:</label>
                <select class="custom-select" id="category" name="category_id"
                    @error('category_id') is-invalid @enderror>
                    <option value="">-</option>
                    @foreach ($categories as $category)
                        <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                            {{ $category->label }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-12">
                <label for="content">Contenuto:</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10"
                    required>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-8">
                <label for="image">Immagine:</label>
                <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image"
                    name="image">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-2 ml-auto">
                @if ($post->image)
                    <img src="{{ asset("storage/$post->image") }}" width="150" class="img-fluid rounded"
                        alt="{{ $post->slug }}" id="preview">
                @else
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw_HeSzHfBorKS4muw4IIeVvvRgnhyO8Gn8w&usqp=CAU"
                        width="150" class="img-fluid rounded" alt="preview" id="preview">
                @endif
            </div>
            <div class="col-6">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="is-published" name="is_published"
                        {{ old('is_published', $post->is_published) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is-published">Pubblica</label>
                </div>
            </div>
            <div class="col-12">
                <div class=" d-flex flex-wrap @error('tags') is-invalid @enderror">
                    @foreach ($tags as $tag)
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                id="tag-{{ $tag->id }}" name="tags[]"
                                @if (in_array($tag->id, old('tags', $post_tags_ids ?? []))) checked @endif>
                            <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->label }}</label>
                        </div>
                    @endforeach
                </div>
                @error('tags')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-end align-items-center ml-auto pt-3">
                <button type="reset" class="btn btn-sm btn-info mr-2" id="reset">Reset <i
                        class="fa-solid fa-arrow-rotate-left"></i></button>
                <button type="submit" class="btn btn-sm btn-info">Salva <i class="fa-solid fa-floppy-disk"></i></button>
            </div>
            </form>
        </div>
    </div>
</div>
