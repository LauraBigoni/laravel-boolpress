<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <style>
        body {
            margin: 0 auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            background-color: rgb(151, 210, 251);
        }

        div.content {
            margin: 0 auto;
            width: 60%;
            background-color: rgb(225, 239, 246);
            border-radius: 20px;
        }

        img {
            width: 200px;
            height: auto auto;
            border-radius: 20px;
        }

        body div ul {
            padding-left: 0;
            list-style-type: none;
        }

    </style>
</head>

<body>
    <div class="content">
        <h1>Complimenti hai creato il post!</h1>

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
            <p>Tags:</p>
            @if ($post->tags)
                <ul>
                    @foreach ($post->tags as $tag)
                        <li>- {{ $tag->label }}</li>
                    @endforeach
                </ul>
            @else
                <p>Nessun tag</p>
            @endif
        </div>
        @if ($post->is_published == 1)
            <p>Post pubblicato.</p>
        @else
            <p>Non ancora pubblicato.</p>
        @endif
    </div>
</body>

</html>
