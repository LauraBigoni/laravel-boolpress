<div class="container">
    <div class="row">
        <div class="col-12">
            <header>
                @if ($tag->exists)
                    <h1 class="text-center">Aggiorna il tag</h1>
                @else
                    <h1 class="text-center">Crea un nuovo tag</h1>
                @endif
            </header>
            @if ($errors->any())
                <div class="alert alert-{{ session('type') ?? 'info' }} text-center" role="alert">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="d-flex justify-content-end align-items-center col-12 pt-3">
                <a class="btn btn-sm btn-info ml-auto" href="{{ route('admin.tags.index') }}">Indietro <i
                        class="fa-solid fa-arrow-left"></i></a>
            </div>
            @if ($tag->exists)
                <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST"
                    class="col-12 d-flex flex-wrap align-items-center" novalidate>
                    @method('PUT')
                @else
                    <form action="{{ route('admin.tags.store') }}" method="POST"
                        class="col-12 d-flex flex-wrap align-items-center" novalidate>
            @endif
            @csrf
            <div class="form-group col-8">
                <label for="label">Nome:</label>
                <input type="text" class="form-control @error('label') is-invalid @enderror" id="label" name="label"
                    value="{{ old('label', $tag->label) }}" required>
                @error('label')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-2">
                <label for="color" class="form-label">Color picker</label>
                <input type="color" class="form-control form-control-color" id="color" name="color"
                    value="{{ old('color', $tag->color ?? '#f0ff00') }}" title="Choose your color">
            </div>
            @error('color')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="d-flex justify-content-end align-items-center ml-auto pt-3">
            <button type="reset" class="btn btn-sm btn-info mr-2">Reset <i
                    class="fa-solid fa-arrow-rotate-left"></i></button>
            <button type="submit" class="btn btn-sm btn-info">Salva <i class="fa-solid fa-floppy-disk"></i></button>
        </div>
        </form>
    </div>
</div>
</div>
