@component('mail::message')
# Complimenti hai creato il post!

<h2>Titolo del post: {{ $post->title }}</h2>
@if ($post->image)
<img class="img-fluid" src="{{ asset("storage/$post->image") }}" alt="{{ $post->slug }}">
@else
<p>Nessun immagine inserita</p>
@endif
<address>Da: {{ $post->author->name }}</address>
<span>Pubblicato alle: {{ $post->getFormattedDate('created_at') }}</span> <br>
<span><strong>Categoria: </strong> {{ $post->category->label }}</span>
<div>
@if ($post->tags)
<p>Tags:</p>
<ul>
@foreach ($post->tags as $tag)
<li>{{ $tag->label }}</li>
@endforeach
</ul>
@endif
</div>

@component('mail::button', ['url' => $url])
Vedi il post
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
