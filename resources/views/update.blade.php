<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $article->resume }}">
    <title>Mis a jour de {{ $article->titre }}</title>
    <script src="{{ secure_url('mycss/vendor/ckeditor/ckeditor.js') }}"></script>
    <link href="{{secure_url('mycss/vendor/ckeditor/contents.css') }}" rel="stylesheet">
    <link href="{{secure_url('mycss/assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
    <h1>
        Update: {{ $article->titre }}
    </h1>
    <form action="/article/exeupdate/{{$article->id}}" method="post">
        @csrf

        <div>
            <div>
                <label for="titre">Titre</label>
                <input type="text" name="titre" value="{{ $article->titre }}" id="titre">
            </div>
            <div>
                <label for="titre">Categoire</label>
                <select name="categorie" id="categorie">
                    @foreach($listecategorie as $a)
                        <option value="{{ $a->id }}" 
                            @if ($a->id == $article->categorie)
                                selected
                            @endif
                            >{{ $a->nomcategorie }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="resume">Resume</label>
                <textarea name="resume">{{ $article->resume }}</textarea>
            </div>
            <div>
            Contenu:<textarea name="contenu" id="editor">
                {!!$article->contenu !!}
            </textarea>
                                 
<script>
    CKEDITOR.replace('contenu');
</script>
            </div>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>